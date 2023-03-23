$(document).ready(function(){    
    var cards_chosen_id = []
    var chosen_arrid = []
    var cards_matched = 0
    var game_starttime = Date.now()     //For score in seconds
    var shuffle_cards = []
    var card = document.querySelectorAll('.pics')
    var pairs = card.length/2   

    //having an array of random indexes from 0..totalcards based on selected level

    for(i=0;i<pairs;i++){
        shuffle_cards.push(i)
    }
    for(i=0;i<pairs;i++){
        shuffle_cards.push(i)
    }
    shuffle_cards = shuffle_cards.sort(() => Math.random() - 0.5)

    for(i=0;i<card.length;i++){
        var j = shuffle_cards[i]        //randomizing placement of cards on board          
        card[i].addEventListener('click', cardflip)
        card[i].setAttribute('name', cards[j].name)
        card[i].setAttribute('path', cards[j].path)
        card[i].setAttribute('card_id', j)
        card[i].setAttribute('arr_id', i)
    }   

    function checkformatch(){        
        var card1_id = cards_chosen_id[0]
        var card2_id = cards_chosen_id[1]
        var chosen1 = chosen_arrid[0]
        var chosen2 = chosen_arrid[1]

        if(card1_id == card2_id){
            console.log("matched")
            cards_matched += 1
            card[chosen1].setAttribute('src', 'images\\ks (26).png')    
            card[chosen2].setAttribute('src', 'images\\ks (26).png')    
            card[chosen1].removeEventListener('click', cardflip)
            card[chosen2].removeEventListener('click', cardflip)
            if(cards_matched == pairs){
                gamewon()
            }
        }else{
            console.log("try again")
            card[chosen1].setAttribute('src', 'images\\ks (1).png')
            card[chosen2].setAttribute('src', 'images\\ks (1).png')            
        }

        var change_moves = Number(document.getElementById("move").innerHTML) 
        console.log("moves:", change_moves)
        document.getElementById("move").innerHTML  = change_moves + 1
        cards_chosen_id = []
        chosen_arrid = []
    }

    function cardflip(){      
        var selected_card_id = this.getAttribute('card_id') //returns card-id to compare
        var sel_arrid = this.getAttribute('arr_id')         //returns placement in card array
        console.log("array id: ", sel_arrid)        
        var back_img = this.getAttribute('path')
        this.setAttribute('src', back_img)        
        cards_chosen_id.push(selected_card_id)
        chosen_arrid.push(sel_arrid)        
        
        //Starting score time when player flips the first card
        if(Number(document.getElementById("move").innerHTML) == 0){
            game_starttime = Date.now()  
        }
        
        //Checking for match if two cards flipped
        if(cards_chosen_id.length == 2){ 
            console.log("checkformatchcalled")           
            setTimeout(checkformatch, 500)            
        }      
    }
    
    function gamewon(){        
        var game_endtime = Date.now()
        var score = (game_endtime - game_starttime)/1000
        alert("Your Score: "+ score+"seconds")        
        document.cookie = 'score='+score;
        var level_won = Number(document.getElementById("level").innerHTML)
        document.cookie = 'level_won='+level_won;

        if (confirm("Wanna Play Again") == true){
            location.reload()
        }else{
            location.href = "process.php"
        }        

    }     
    
})    
        
