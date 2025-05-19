const body = document.querySelector('body');
const namaUser = body.dataset.nama;
const emailUser = body.dataset.email;

console.log("Nama:", namaUser);
console.log("Email:", emailUser);
const ctx = document.getElementById("myChart").getContext("2d");

let chart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [],
    datasets: [{
      backgroundColor: [],
      data: []
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
      title: {
        display: true,
        text: "Emisi Karbon per Hari"
      }
    }
  }
});

document.getElementById("terapkanFilter").addEventListener("click", function () {
  const start = document.getElementById("tanggalAwal").value;
  const end = document.getElementById("tanggalAkhir").value;
  if (start && end) {
    ambilData(start, end);
  } else {
    alert("Mohon pilih tanggal awal dan akhir.");
  }
});

function ambilData(tglAwal, tglAkhir) {
  fetch(`/grafik-data?tanggal_awal=${tglAwal}&tanggal_akhir=${tglAkhir}`)
    .then(res => res.json())
    .then(data => {
      const labels = data.map(item => item.tanggal);
      const emisi = data.map(item => item.hasil_emisi);
      const warna = data.map(() => getRandomColor());

      chart.data.labels = labels;
      chart.data.datasets[0].data = emisi;
      chart.data.datasets[0].backgroundColor = warna;
      chart.update();
    });
}

function getRandomColor() {
  const colors = ["#f94144", "#f3722c", "#f9c74f", "#90be6d", "#43aa8b", "#577590"];
  return colors[Math.floor(Math.random() * colors.length)];
}

window.onload = function () {
  const now = new Date();
  const akhir = now.toISOString().split("T")[0];

  const awalDate = new Date();
  awalDate.setDate(now.getDate() - 30);
  const awal = awalDate.toISOString().split("T")[0];

  document.getElementById("tanggalAwal").value = awal;
  document.getElementById("tanggalAkhir").value = akhir;

  ambilData(awal, akhir);
};

setTimeout(function() {
    var alertNode = document.querySelector('.alert');
    if (alertNode) {
      var alertInstance = bootstrap.Alert.getOrCreateInstance(alertNode);
      alertInstance.close();
    }
  }, 3000);
document.getElementById("logoutButton").addEventListener("click", function (e) {
e.preventDefault();
Swal.fire({
  title: 'keluar dari Akun',
  html: `
    <p>Apakah anda yakin akan keluar?</p>
    <img src="../../img/human.jpg" width="300" height="150" style="margin-top: 20px; border-radius:10px;">
  `,
  background: '#256020',
  color: '#fff',
  showDenyButton: true,
  denyButtonText: 'Yakin banget!',
  confirmButtonText: 'Enggak jadi deh..',
  reverseButtons: true,
  draggable: true,
  confirmButtonColor: "#b4b4b4"
}).then((result) => {
  if (result.isDenied) {
    window.location.href = "../masuk/proses_keluar.php";
  }
});
});