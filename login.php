<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* ---------- GLOBAL ---------------*/
body{
    margin:0;
    font-family: "Poppins", sans-serif;
    background:#2A1D12; /* dark brown */
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:20px;
}

/* ----------- CARD ----------------*/
.container{
    width:100%;
    max-width:420px;
    background:#3C2A20;
    padding:40px 50px;   
    border-radius:12px;
    box-shadow:0px 8px 25px rgba(0,0,0,0.5);
}

/* ----------- TITLE ---------------*/
h2{
    color:#EEDAC6;
    text-align:center;
    margin-bottom:25px;
}

/* ----------- FORM INPUT ----------*/
label{
    display:inline-block;
    width:100%;
    max-width: 120px; 
    color:#F4E6D7;
    font-weight:600;
    margin-bottom:6px;
}

input{
    width:100%;
    padding:12px;
    border:none;
    outline:none;
    background:#E6D5C2;
    border-radius:6px;
    margin-bottom:18px;
    font-size:15px;
    
}

/* ----------- BUTTON --------------*/
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:6px;
    background:#6E4B3A;
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#8b604b;
}

/* ----------- MOBILE --------------*/
@media(max-width:420px){
    .container{
        padding:25px;
    }
    h2{
        font-size:22px;
    }
}

</style>
</head>
<body>

<div class="container">
    <h2>Login Admin</h2>

    <form action="cek_login.php" method="POST">
        
        <label>Username</label>
        <input type="text" name="user" required>

        <label>Password</label>
        <input type="password" name="pass" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
