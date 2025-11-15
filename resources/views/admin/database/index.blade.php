@extends('layouts.admin')

@section('judul', 'Database ekraf sumedang')

@section('main')
<div class="p-6">
    <h1 class="text-2xl font-bold text-[#004b5c] mb-4">
        Database ekraf sumedang
    </h1>

    {{-- Peta utama --}}
    <div id="map-container"
        class="relative bg-gray-50 w-full h-[700px] rounded-xl shadow-lg overflow-hidden">
    </div>

    {{-- Card info detail --}}
    <div id="info-card"
        class="hidden mt-6 bg-white p-6 rounded-2xl shadow-md border border-gray-200 transition-all duration-500 transform opacity-0 scale-95">
        <div id="mini-map" class="w-full h-[200px] mb-4 flex items-center justify-center"></div>
        <h2 id="nama-kecamatan" class="text-xl font-bold text-[#004b5c] mb-1"></h2>
        <p id="lokasi" class="text-sm text-gray-500 mb-3"></p>

        <ul class="text-sm text-gray-700 space-y-1">
            <li>• Jumlah Usaha: <span id="usaha" class="font-semibold">—</span></li>
            <li>• Rata-rata Pendapatan: <span id="rataPendapatan" class="font-semibold">—</span></li>
            <li>• Rata-rata Tenaga Kerja: <span id="rataTenagaKerja" class="font-semibold">—</span></li>
        </ul>
        <a href=""
        class="text-blue-600 hover:underline">Detail</a>
    </div>
</div>

<script src="https://d3js.org/d3.v7.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const width = document.getElementById('map-container').clientWidth;
  const height = 700;

  const svg = d3.select('#map-container')
    .append('svg')
    .attr('width', width)
    .attr('height', height)
    .attr('class', 'bg-gray-50');

  const projection = d3.geoMercator()
    .scale(52000)
    .center([107.95, -6.85])
    .translate([width / 2, height / 2]);

  const path = d3.geoPath().projection(projection);
  const colors = d3.scaleOrdinal(d3.schemeSet3);

  d3.json('{{ asset("maps/32.11_kecamatan.geojson") }}').then(data => {
    const groups = svg.selectAll('g')
      .data(data.features)
      .enter()
      .append('g')
      .attr('class', 'kecamatan-group');

    // 🌍 Wilayah kecamatan
    groups.append('path')
      .attr('d', path)
      .attr('fill', (d, i) => colors(i))
      .attr('stroke', '#fff')
      .attr('stroke-width', 1)
      .style('cursor', 'pointer')
      .style('transition', 'all 0.3s ease');

    // 🏷️ Label nama kecamatan
    groups.append('text')
      .attr('x', d => path.centroid(d)[0])
      .attr('y', d => path.centroid(d)[1])
      .attr('text-anchor', 'middle')
      .attr('dominant-baseline', 'middle')
      .attr('font-size', '7px')
      .attr('font-weight', '600')
      .attr('fill', '#222')
      .text(d => d.properties.nm_kecamatan || '');

    // 🔹 Efek hover
    groups
      .on('mouseover', function (event, d) {
        const group = d3.select(this);
        if (!d.active) {
          group.raise();
          group.select('path')
            .transition().duration(200)
            .attr('transform', 'scale(1.03)')
            .style('filter', 'drop-shadow(0 0 8px rgba(0,0,0,0.3))');
          group.select('text')
            .raise()
            .transition().duration(200)
            .attr('font-size', '9px')
            .attr('fill', '#004b5c');
        }
      })
      .on('mouseout', function (event, d) {
        const group = d3.select(this);
        if (!d.active) {
          group.select('path')
            .transition().duration(200)
            .attr('transform', 'scale(1)')
            .style('filter', 'none');
          group.select('text')
            .transition().duration(200)
            .attr('font-size', '7px')
            .attr('fill', '#222');
        }
      })
      .on('click', async function (event, d) {
        // Reset semua
        svg.selectAll('g').each(function (f, i) {
          f.active = false;
          d3.select(this).select('path')
            .attr('transform', 'scale(1)')
            .style('filter', 'none')
            .attr('fill', colors(i))
            .attr('stroke', '#fff')
            .attr('stroke-width', 1);
          d3.select(this).select('text')
            .attr('fill', '#222')
            .attr('font-size', '7px');
        });

        // Aktifkan yang diklik
        d.active = true;
        const group = d3.select(this);
        group.raise();
        group.select('path')
          .transition().duration(300)
          .attr('fill', '#4D96FF')
          .attr('stroke', '#004b5c')
          .attr('stroke-width', 2)
          .style('filter', 'drop-shadow(0 0 10px rgba(0,0,0,0.5))');

        group.select('text')
          .raise()
          .transition().duration(300)
          .attr('fill', '#004b5c')
          .attr('font-size', '9px');

        const nama = d.properties.nm_kecamatan || 'Tanpa Nama';
        const kdKecamatan = d.properties.kd_kecamatan;

        let usaha = '—', rataPendapatan = '—', rataTenaga = '—';

       try {
            const url = `kecamatan/${kdKecamatan}/statistik`;
            console.log('🔍 Fetching:', url);
            const res = await fetch(url);

            if (res.ok) {
                const json = await res.json();
                console.table(json);
                usaha = json.jumlah_usaha ?? '—';
                rataPendapatan = json.rata_pendapatan
                ? `Rp${json.rata_pendapatan.toLocaleString('id-ID')}`
                : '—';
                rataTenaga = json.rata_tenaga_kerja ?? '—';
                const detailLink = document.querySelector('#info-card a');
                if (detailLink) {
                 detailLink.href = `/admin/kecamatan/${kdKecamatan}/detail`;
                }
            } else {
                console.warn('⚠️ Gagal ambil data:', res.status, res.statusText);
            }
            } catch (err) {
            console.error('❌ Error fetch:', err);
            }

        // 📊 Tampilkan card
        const infoCard = document.getElementById('info-card');
        infoCard.classList.remove('hidden');
        infoCard.style.opacity = 0;
        infoCard.style.transform = 'scale(0.95)';
        setTimeout(() => {
          infoCard.style.transition = 'all 0.4s ease';
          infoCard.style.opacity = 1;
          infoCard.style.transform = 'scale(1)';
        }, 50);

        document.getElementById('nama-kecamatan').textContent = nama;
        document.getElementById('lokasi').textContent = `Lokasi: ${nama}, Kabupaten Sumedang`;
        document.getElementById('usaha').textContent = usaha;
        document.getElementById('rataPendapatan').textContent = rataPendapatan;
        document.getElementById('rataTenagaKerja').textContent = rataTenaga;

        // 🗺️ Mini Map
        const mini = d3.select('#mini-map');
        mini.selectAll('*').remove();
        const miniSvg = mini.append('svg')
          .attr('width', 220)
          .attr('height', 220)
          .attr('viewBox', '0 0 220 220');

        const miniProjection = d3.geoMercator().fitSize([220, 220], d);
        const miniPath = d3.geoPath().projection(miniProjection);

        miniSvg.append('path')
          .datum(d)
          .attr('d', miniPath)
          .attr('fill', '#4D96FF')
          .attr('stroke', '#fff')
          .attr('stroke-width', 1);
      });
  });
});
</script>
@endsection
