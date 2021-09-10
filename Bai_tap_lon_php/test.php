<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<input id="gender_Male" type="checkbox" name="option">

<script>
    document.getElementById('gender_Male').onchange = function() {
        if(document.getElementById('gender_Male').checked) {
            console.log("đã checked");
        }else{
            console.log("chưa checked");
        }
    }
</script>

</body>
</html>