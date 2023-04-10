<head>
<style>
        input[type="text"] {
            width: 30px;
            display: inline-block;
            margin-right: 20px;
        }
    </style>
</head>
<form action=<?php echo $verificationURL?> method="post">
<input name="txt[]"  type="text" value=""></input>
<input name="txt[]"  type="text" value=""></input>
<input name="txt[]"  type="text" value=""></input>
<input name="txt[]"  type="text" value=""></input>
<input name="txt[]"  type="text" value=""></input>
<input name="txt[]"  type="text" value=""></input><br/><br/>
<button type="submit">Click Karo</button>
</form>