$(document).ready(function() {
  // Inisialisasi DataTable
  var table = $('#riwayatTable').DataTable();

  // Ambil data perjalanan dari Blade (window.dataPerjalanan)
  var dataPerjalanan = window.dataPerjalanan || [];

  // Inisialisasi Chart.js
  const ctx = document.getElementById('emissionChart').getContext('2d');
  let myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [],
      datasets: [{
        label: 'Emisi CO₂ (kg) per Tanggal',
        data: [],
        backgroundColor: 'rgba(4, 80, 4, 0.7)',
        borderColor: 'rgba(4, 80, 4, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: { beginAtZero: true, title: { display: true, text: 'Emisi (kg CO₂)' } },
        x: { title: { display: true, text: 'Tanggal' } }
      }
    }
  });

  // Fungsi update chart berdasarkan data filtered
  function updateChart(data) {
    let emisiPerTanggal = {};
    data.forEach(item => {
      let tanggalStr = item.tanggal; // yyyy-mm-dd
      if (!emisiPerTanggal[tanggalStr]) emisiPerTanggal[tanggalStr] = 0;
      emisiPerTanggal[tanggalStr] += parseFloat(item.hasil_emisi);
    });

    const labels = Object.keys(emisiPerTanggal).sort();
    const dataEmisi = labels.map(key => emisiPerTanggal[key].toFixed(4));

    myChart.data.labels = labels;
    myChart.data.datasets[0].data = dataEmisi;
    myChart.update();
  }

  // Fungsi update DataTable berdasarkan data filtered
  function updateTable(data) {
    table.clear();
    data.forEach(item => {
      table.row.add([
        item.tanggal,
        '-', // tujuan kosong
        item.jenis_kendaraan,
        item.jarak_km,
        item.hasil_emisi
      ]);
    });
    table.draw();
  }

  // Fungsi filter data berdasarkan tanggal
  function filterData(startDateStr, endDateStr) {
    if (!startDateStr || !endDateStr) return dataPerjalanan;
    const startDate = new Date(startDateStr);
    const endDate = new Date(endDateStr);
    return dataPerjalanan.filter(item => {
      const tgl = new Date(item.tanggal);
      return tgl >= startDate && tgl <= endDate;
    });
  }

  // Tampilkan semua data awal
  updateChart(dataPerjalanan);
  updateTable(dataPerjalanan);

  // Event klik tombol filter
  $('#filterBtn').on('click', function() {
    let startDate = $('#startDate').val();
    let endDate = $('#endDate').val();

    if (!startDate || !endDate) {
      alert('Harap isi tanggal mulai dan selesai!');
      return;
    }

    if (new Date(startDate) > new Date(endDate)) {
      alert('Tanggal mulai harus lebih kecil atau sama dengan tanggal selesai!');
      return;
    }

    const filteredData = filterData(startDate, endDate);
    updateChart(filteredData);
    updateTable(filteredData);
  });
});
