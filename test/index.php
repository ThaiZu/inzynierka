<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<h1>Kuchnia</h1>
<div id="result" style="font-size: xx-large"></div>
<?php
$_SESSION['id'] = 0;
?>
<script>
    if(typeof(EventSource) !== "undefined") {
        var source = new EventSource("demo_sse.php");
        source.onmessage = function(event) {
            document.getElementById("result").innerHTML += event.data + "<br>";
        };
    } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
    }
</script>

</body>
</html>


