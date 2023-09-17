<?php
class Calculator {
    public function kalkulator($num1, $num2, $operator) {
        $operation = new Operation();
        switch ($operator) {
            case '+':
                return $operation->tambah($num1, $num2);
            case '-':
                return $operation->kurang($num1, $num2);
            case '*':
                return $operation->kali($num1, $num2);
            case '/':
                return $operation->bagi($num1, $num2);
            default:
                return "Operator tidak valid";
        }
    }
}

class Operation {
    public function tambah($num1, $num2) {
        return $num1 + $num2;
    }

    public function kurang($num1, $num2) {
        return $num1 - $num2;
    }

    public function kali($num1, $num2) {
        return $num1 * $num2;
    }

    public function bagi($num1, $num2) {
        if ($num2 == 0) {
            return "Tidak bisa dibagi oleh nol";
        }
        return $num1 / $num2;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    $calculator = new Calculator();
    $result = $calculator->kalkulator($num1, $num2, $operator);
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
    <link rel="website icon" href="iconCal.webp">
    <style>
    h1{
        position: relative;
        left: 100px;
    }

      .btn{
        position: relative;
        top: 5px;
        height: 29px;
      }
      #input{
        height: 29px;
      }

      .hasil{
        position: relative;
        top: 10px;
        width: 200px;
        height: 40px;
        border: 1px solid;
      }
      #hasil{
        position: relative;
        left: 40px;
        bottom: 18px;
      }
      #input-btn{
        height: 25px;
        width: 30px;
        text-align:  center;
      }
    </style>
</head>
<body>
    <h1>Kalkulator</h1>
    <form method="post" class="input">
        <!-- inputan dari user -->
        <input  id="input"  type="number" name="num1" placeholder="Angka pertama" required >
        <input  id="input"  type="number" name="num2" placeholder="Angka kedua" required>
        <!-- selesai inputan dari user -->
        <br>
        <!-- tombol operator -->
        <nav class="btn">
        <input id="input-btn" type="submit" name="operator" value="+" class="operator-button">
        <input id="input-btn" type="submit" name="operator" value="-" class="operator-button">
        <input id="input-btn" type="submit" name="operator" value="*" class="operator-button">
        <input id="input-btn" type="submit" name="operator" value="/" class="operator-button">
    </nav>
    </form>

    <!-- hasil dari inputan user -->
    <div class="hasil">
        Hasil:
    <?php if (isset($result) ){?>
        <div id="hasil">
            <?php echo  $result;?>
        </div>
    <?php }?>
    </div>
</body>
</html>
