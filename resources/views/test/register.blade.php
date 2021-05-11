<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="#"> 
        <button id="rgtBtn">Enviar</button>
    </form>

    <div id="rgtErrorAlert"></div>

    <script>
        let rgtBtn = document.getElementById("rgtBtn");
        let rgtErrorAlert = document.getElementById("rgtErrorAlert");

        rgtBtn.addEventListener("click",(e)=>{
            e.preventDefault();

            fetch("http://localhost:3000/test")
            .then((res)=>{
                
                return res.json()
                
            }).then((res)=>{
                console.log(res);
                rgtErrorAlert.textContent = res.error
                rgtErrorAlert.style.display = "block";
                
            })

        })

    </script>
</body>
</html>