<footer class="mt-auto text-white pt-3 rounded px-2" style="background:linear-gradient(45deg, #008080, #2F4F4F);">
    <p>&nbsp; Absensi <?php echo date('Y') ?>.</p>
</footer>
</div>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Yakin ingin logout ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo base_url('logoutsiswa') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script> -->

<!-- Bootbox Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

<!-- <script>
    $('#logout').on('click', function() {
        bootbox.alert("Hello world!");
    })
</script> -->


<script>
    function getDtlMapel(id) {
        // var id = $(this).attr('id');
        var id_mapel = id
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "<?php echo base_url('siswa/getJadwal') ?>",
            data: {
                id_mapel: id_mapel
            },
            success: function(res) {
                console.log(res.data[0])
                $('body').css('text-align', 'left')
                bootbox.alert('<table class="table table-hover" style="text-align:left; color:black; border:1px solid #2F4F4F;"><tr style="background:#2F4F4F; color:white;"> <th> Guru &nbsp; </th> <th> Mulai &nbsp; </th>  <th> Selesai &nbsp; </th> </tr> <tr> <td id = "guru"> <td id="jam"> </td>  <td id="jams"> </td> </tr> </table>')

                $('#guru').text(res.data[0].nama_guru)
                $('#jam').text(res.data[0].jam_mulai.substr(0, 5))
                $('#jams').text(res.data[0].jam_selesai.substr(0, 5))
                $('.bootbox-close-button').hide()
                $('.bootbox-accept').text('Close')
                $('.bootbox-accept').css('padding', '4px')
                $('.bootbox-accept').css('padding-top', '0')
                $('.bootbox-accept').css('padding-bottom', '0')
            }
        });
    }
</script>
<script>
    function getKdAbs(id, n) {
        // $('#nmpl').val(nama)
        var abs = $('#modal_abs')
        // var kdm = $('#kdM').val()
        $('#mapel_id').val(id) 
        abs.show()
        $('#closeModal').on('click', function() {
            abs.hide()
        })
        // alert(n)
        $('#absMasuk').on('click', function() {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: "<?php echo base_url('absen/cekAbs'); ?>",
                data: {
                    no_absen: n
                },
                success: function(res) {
                    var mk = id
                    $.ajax({
                        type: 'POST',
                        dataType: 'JSON',
                        url: "<?php echo base_url('absen/masuk'); ?>",
                        data: {
                            mapel_id: mk
                        },
                        success: function() {

                        }
                    });
                    abs.hide()
                    location.reload();

                }
            });
        });
    }
</script>

<script>
    $(document).ready(function() {
        window.onload = function() {
            jam();
        }

        var valDate = document.querySelector('#date')
        var month = document.querySelector('#month')
        var date = new Date()
        var bulan = ('Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember')
        bulan = bulan.split(" ")
        d = date.getDate()
        m = date.getMonth()
        y = date.getFullYear()

        valDate.append(d)
        $('#date').css('fontSize', '45px')
        month.append(bulan[m])
        $('month').css('marginTop', '-10px')

        setInterval(function jam() {
            var dateTime = document.querySelector('#dateTime')
            var date = new Date(),
                h, m, s;
            h = date.getHours();
            m = set(date.getMinutes());
            s = set(date.getSeconds());

            dateTime.innerHTML = h + ':' + m + ':' + s;
            dateTime.style.fontSize = '14px'

        }, 1000)

        function set(dateTime) {
            dateTime = dateTime < 10 ? '0' + dateTime : dateTime;
            return dateTime;
        }
    })
</script>

</body>

</html>