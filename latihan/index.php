<!DOCTYPE html>
<html>

<head>
    <title>Simple Crud Ajax</title>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {

            //load data mahasiswa saat aplikasi dijalankan 
            loadData();

            //Load form add
            $("#contentData").on("click", "#addButton", function() {
                $.ajax({
                    url: 'form-add.php',
                    type: 'get',
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //Load form edit dengan parameter IdMhsw
            $("#contentData").on("click", "#EditButton", function() {
                var IdMhsw = $(this).attr("value");
                $.ajax({
                    url: 'form-edit.php',
                    type: 'get',
                    data: {
                        IdMhsw: IdMhsw
                    },
                    success: function(data) {
                        $('#contentData').html(data);
                    }
                });
            });

            //button batal
            $("#contentData").on("click", "#cancelButton", function() {
                loadData();
            });

            //simpan data mahasiswa
            $("#contentData").on("submit", "#formAdd", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            //edit data mahasiswa
            $("#contentData").on("submit", "#formEdit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service.php?action=edit',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });

            //hapus data mahasiswa berdasarkan IdMhsw
            $("#contentData").on("click", "#DeleteButton", function() {
                var IdMhsw = $(this).attr("value");
                $.ajax({
                    url: 'service.php?action=delete',
                    type: 'post',
                    data: {
                        IdMhsw: IdMhsw
                    },
                    success: function(data) {
                        alert(data);
                        loadData();
                    }
                });
            });
        })

        function loadData() {
            $.ajax({
                url: 'data-mahasiswa.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }
    </script>
</head>

<body>
    <div align="center">
        <h2>Simple Crud Ajax dan PHP</h2>
        <div id="contentData"></div>
    </div>
</body>

</html>