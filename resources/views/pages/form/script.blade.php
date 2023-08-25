<script>
    $(document).ready(function () {
        $('#tambah').click(function() {
            document.getElementById("jumlah").stepUp();
        })
        $('#kurang').click(function() {
            document.getElementById("jumlah").stepDown();
        })
    });

    function myFunction() {
        let text = document.getElementById("myInput").value;
        document.getElementById("demo").innerHTML = "You wrote: " + text;
    }
</script>
