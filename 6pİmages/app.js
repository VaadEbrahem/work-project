
let index = 0;

show_image(index);

function show_image(num){
    index += num ;

    let images = document.getElementsByClassName("image");

    let dots = document.getElementsByClassName("dot");

    for(let i=0; i<images.length ; i++){

        images[i].style.display ="none";
    }

    for(let j=0; j<dots.length ; j++)
    {
        dots[j].className = dots[j].className.replace(" active" , "");
    }

    if(index >images.length-1)
    {
        index = 0 ;
    }

    if(index < 0)
    {
        index = images.length -1;
    }

    images[index].style.display="block";
    dots[index].className +=" active";
}
