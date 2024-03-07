<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<!-- Script JavaScript untuk menampilkan hasil normalisasi dan perhitungan jarak -->
<script>
    // Fungsi untuk menampilkan hasil normalisasi dan perhitungan jarak
    function tampilHasilNormalisasi(data) {
        // Ambil elemen tabel hasil normalisasi
        var tabelHasilNormalisasi = document.getElementById('hasilNormalisasiTable');
        // Hapus konten tabel hasil normalisasi jika ada
        tabelHasilNormalisasi.innerHTML = '';

        // Buat header tabel hasil normalisasi
        var header = `<thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 20%;">
                                Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                style="width: 20%;">
                                Asal Sekolah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Nilai Test</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Penghasilan Ortu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Tanggungan Ortu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Riwayat Organisasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Riwayat Prestasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                KIP</th>

                        </tr>
                    </thead>`;

        // Buat baris tabel hasil normalisasi dengan data yang dihasilkan dari normalisasi
        var rows = '';
        data.forEach(function(item) {
            rows += `<tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${item.nama}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">${item.asalSekolah}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.rataRapor}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.penghasilanOrtu}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.tanggunganOrtu}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.riwayatOrganisasi}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.riwayatPrestasi}</p>
                        </td>
                        <td class="text-center">
                            <span class="text-xs font-weight-bold">${item.KIP == 1 ? 'Ya' : 'Tidak'}</span>
                        </td>

                    </tr>`;
        });

        // Gabungkan header dan rows, lalu tambahkan ke dalam tabel hasil normalisasi
        tabelHasilNormalisasi.innerHTML = header + '<tbody>' + rows + '</tbody>';

        // Tampilkan tabel hasil normalisasi (sebelumnya display: none)
        tabelHasilNormalisasi.style.display = 'table';
    }

    // Fungsi untuk melakukan normalisasi dan menghitung jarak melalui AJAX
    function normalisasiData() {
        $.ajax({
            url: '{{ url('/normalisasi-data') }}', // Ganti URL sesuai dengan route yang Anda gunakan
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                tampilHasilNormalisasi(data);
            },
            error: function(error) {
                console.error('Terjadi kesalahan saat melakukan normalisasi: ' + error);
            }
        });
    }

    // Event listener untuk tombol normalisasi
    document.getElementById('btnNormalisasi').addEventListener('click', normalisasiData);
</script>

<!-- Script JavaScript untuk menampilkan hasil normalisasi dan perhitungan jarak -->
<script>
    // Fungsi untuk menampilkan hasil normalisasi dan perhitungan jarak
    function tampilHasilNormalisasiTraining(data) {
        console.log(data);
        // Ambil elemen tabel hasil normalisasi
        var tabelHasilNormalisasi = document.getElementById('hasilNormalisasiTableTraining');
        // Hapus konten tabel hasil normalisasi jika ada
        tabelHasilNormalisasi.innerHTML = '';

        // Buat header tabel hasil normalisasi
        var header = `<thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 20%;">
                                Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                style="width: 20%;">
                                Asal Sekolah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Nilai Test</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Penghasilan Ortu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Tanggungan Ortu</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Riwayat Organisasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 15%;">
                                Riwayat Prestasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                KIP</th>

                        </tr>
                    </thead>`;

        // Buat baris tabel hasil normalisasi dengan data yang dihasilkan dari normalisasi
        var rows = '';
        data.normalizedData1.forEach(function(item) {
            rows += `<tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${item.nama}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">${item.asalSekolah}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.rataRapor}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.penghasilanOrtu}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.tanggunganOrtu}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.riwayatOrganisasi}</p>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">${item.riwayatPrestasi}</p>
                        </td>
                        <td class="text-center">
                            <span class="text-xs font-weight-bold">${item.KIP == 1 ? 'Ya' : 'Tidak'}</span>
                        </td>

                    </tr>`;
        });

        // Gabungkan header dan rows, lalu tambahkan ke dalam tabel hasil normalisasi
        tabelHasilNormalisasi.innerHTML = header + '<tbody>' + rows + '</tbody>';

        // Tampilkan tabel hasil normalisasi (sebelumnya display: none)
        tabelHasilNormalisasi.style.display = 'table';
    }

    function tampilHasilNormalisasiJarak(data) {
        console.log(data);
        // Ambil elemen tabel hasil normalisasi
        var tabelHasilNormalisasi = document.getElementById('hasilNormalisasiTableJarak');
        // Hapus konten tabel hasil normalisasi jika ada
        tabelHasilNormalisasi.innerHTML = '';

        // Buat header tabel hasil normalisasi
        var header = `<thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 20%;">
                                Nama(Data Training)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 20%;">
                                Nama(Data Testing)</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Klasifikasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                style="width: 10%;">
                                Distance</th>
                        </tr>
                    </thead>`;

        // Buat baris tabel hasil normalisasi dengan data yang dihasilkan dari normalisasi
        // Gabungkan data dari normalizedData1 dan normalizedData2 secara sejajar
        var normalizedData = [];
        var length = Math.max(data.normalizedData1.length, data.normalizedData2.length);
        for (var i = 0; i < length; i++) {
            var data1 = data.normalizedData1[i] || {};
            var data2 = data.normalizedData2[i % data.normalizedData2.length] || {};
            normalizedData.push({
                'nama': data1.nama,
                'nama2': data2.nama2,
                'Klasifikasi': data1.Klasifikasi,
                'jarak': data1.jarak,
            });
        }


        var rows = '';
        normalizedData.forEach(function(item) {
            rows += `<tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${item.nama}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${item.nama2}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="text-xs font-weight-bold">${item.Klasifikasi}</span>
                        </td>
                        <td class="text-center">
                            <span class="text-xs font-weight-bold">${item.jarak}</span>
                        </td>
                    </tr>`;
        });

        // Gabungkan header dan rows, lalu tambahkan ke dalam tabel hasil normalisasi
        tabelHasilNormalisasi.innerHTML = header + '<tbody>' + rows + '</tbody>';

        // Tampilkan tabel hasil normalisasi (sebelumnya display: none)
        tabelHasilNormalisasi.style.display = 'table';
    }

    // Fungsi untuk melakukan normalisasi dan menghitung jarak melalui AJAX
    function normalisasiData() {
        $.ajax({
            url: '{{ url('/normalisasi-data-training') }}', // Ganti URL sesuai dengan route yang Anda gunakan
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                tampilHasilNormalisasiTraining(data);
            },
            error: function(error) {
                console.error('Terjadi kesalahan saat melakukan normalisasi: ' + error);
            }
        });
    }

    function normalisasiDataJarak() {
        $.ajax({
            url: '{{ url('/normalisasi-data-training') }}', // Ganti URL sesuai dengan route yang Anda gunakan
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                tampilHasilNormalisasiJarak(data);
            },
            error: function(error) {
                console.error('Terjadi kesalahan saat melakukan normalisasi: ' + error);
            }
        });
    }

    // Event listener untuk tombol normalisasi
    document.getElementById('btnNormalisasiTraining').addEventListener('click', normalisasiData);
    document.getElementById('btnNormalisasiJarak').addEventListener('click', normalisasiDataJarak);
</script>



<script>
    function printRow(rowNumber) {
        // Mencari elemen tabel berdasarkan id atau class, disesuaikan dengan kode Anda
        var table = document.querySelector('.table');
        // Mencari elemen baris berdasarkan nomor baris (index-0)
        var row = table.rows[rowNumber - 1];

        // Mengubah warna latar belakang baris menjadi putih agar tampilan cetaknya lebih baik
        row.style.backgroundColor = 'white';

        // Menyembunyikan kolom yang tidak ingin ditampilkan dalam versi cetak
        for (var i = 0; i < row.cells.length; i++) {
            if (i !== 0 && i !== 1 && i !== 2) {
                row.cells[i].style.display = 'none';
            }
        }

        // Mencetak halaman dengan baris yang dipilih
        window.print();

        // Mengembalikan warna latar belakang baris dan menampilkan kembali semua kolom setelah mencetak
        row.style.backgroundColor = '';
        for (var i = 0; i < row.cells.length; i++) {
            row.cells[i].style.display = '';
        }
    }
</script>




<script>
    setTimeout(function() {
        document.querySelector('.alert').style.display = 'none';
    }, 3000); // 3000 milidetik (3 detik)
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
