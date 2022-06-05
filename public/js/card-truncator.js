$(function () {
        cards = document.getElementsByClassName('card-text');

        for(i=0; i< cards.length; i++){
                cards[i].innerHTML = truncateText(cards[i].innerHTML, 120);
        }

        cards = document.getElementsByClassName('card-text text-muted float-end')

        for(i=0; i< cards.length; i++){
                cards[i].innerHTML = truncateText(cards[i].innerHTML, 30);
        }

        cards = document.getElementsByClassName('card-title')

        for(i=0; i< cards.length; i++){
                cards[i].innerHTML = truncateText(cards[i].innerHTML, 40);
        }
});

function truncateText(text, max_char){
        if(text.length <= max_char){
                return text;
        }
        return  text.slice(0,max_char-2) + '...';
}
