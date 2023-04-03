var char_array = []

$(document).ready(function(){
    
    selected = document.querySelectorAll('label')
    console.log(selected)
    char_array.push(document.getElementById("lbl1").innerHTML)
    char_array.push(document.getElementById("lbl2").innerHTML)
    char_array.push(document.getElementById("lbl3").innerHTML)
    char_array.push(document.getElementById("lbl4").innerHTML)
    char_array.push(document.getElementById("lbl5").innerHTML)
    char_array.push(document.getElementById("lbl6").innerHTML)
    char_array = char_array.sort()
    console.log(char_array)    
})

function check(){    
    var inp1 = document.getElementById("txt1").value
    var inp2 = document.getElementById('txt2').value
    alert("checked"+inp1+inp2)
    if (inp1 == char_array[0] && inp2 == char_array[5]){
        document.cookie = 'game_result_6=won';
        console.log("perfect")
        location.reload()
    }else{
        document.cookie = 'game_result_6=lost';
        console.log("not perfect")
        location.reload()
    }
}