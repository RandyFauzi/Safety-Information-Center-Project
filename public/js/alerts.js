function showDetail(data) {
    let apdList = ['sepatu', 'helm', 'kacamata', 'masker', 'earplug']
        .filter(item => data[item])
        .map(item => `• ${data[item]}`)
        .join('<br>');

    Swal.fire({
        title: `<strong>Detail Pengajuan APD</strong>`,
        html: `
            <div style="text-align:left; font-size:14px">
                <p><b>NIK:</b> ${data.nik}</p>
                <p><b>Nama:</b> ${data.nama}</p>
                <p><b>Jabatan:</b> ${data.jabatan}</p>
                <p><b>Departemen:</b> ${data.departemen}</p>
                <p><b>Tanggal Pengambilan:</b> ${data.tanggal_pengambilan}</p>
                <p><b>Status:</b> ${data.status_pengambilan}</p>
                <p><b>Total Potongan:</b> Rp${Number(data.total_potongan).toLocaleString()}</p>
                <p><b>Keterangan:</b> ${data.keterangan ?? '-'}</p>
                <p><b>APD Diambil:</b><br>${apdList}</p>
            </div>
        `,
        showCloseButton: true,
        confirmButtonText: 'Tutup',
        width: 600,
        customClass: {
            popup: 'rounded-lg shadow-xl animate__animated animate__fadeInDown'
        }
    });
}
