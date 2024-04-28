// Setup
const postsList = document.querySelectorAll('section.postskkk .prost');

// fiutramento
const allfilters = document.querySelectorAll('div.filtramento input[type=checkbox]');

var activefilters = [];

allfilters.forEach(element => {
    
    element.addEventListener('change', ()=>{

        if(element.checked){ // adicionamento do filtro

            activefilters.push(element.getAttribute('name'))
            updateFilter(activefilters);

        }else{ // remove target filter

            for(let i = 0; i < activefilters.length; i++){
                if(activefilters[i] == element.getAttribute('name')){
                    activefilters.splice(activefilters.indexOf(activefilters[i]), 1);
                }
            }

            updateFilter(activefilters);

        }

    });

});

// fiulter funcao
function updateFilter(newFilter){

    activefilters = newFilter;

    for(let i = 0; i < postsList.length; i++){

        postsList[i].style.display = 'none';

        if(activefilters.length == 0){
            postsList[i].style.display = 'block';

        }else{

            for(let j = 0; j < activefilters.length; j++){

                if(activefilters[j] == postsList[i].getAttribute('categoriamento')){
                    postsList[i].style.display = 'block';

                }

            }

        }

    }

}
