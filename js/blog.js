var to_display = 3;
var articles_length = 0;
var page = 0;
var last_page;
var previos_btn = document.getElementById("subtractPage");
var next_btn = document.getElementById("addPage");
var page_of_page = document.getElementById("page_of_page");
var blog_offset = document.getElementById("Blog").offsetTop;

function count_asrticles(){
    articles_length = $('#blog_content .article').length
    last_page=Math.ceil(articles_length/to_display)-1;
    display(to_display);
}

function display(int){
    if(page<0)page=0;
    if(page>last_page)page=last_page;
    if(page==0){
        previos_btn.style.display = "none";
        next_btn.style.display = "block";
    }
    else if(page==last_page){
    next_btn.style.display = "none";
    previos_btn.style.display = "block";
    }
    else{
        previos_btn.style.display = "block";
        next_btn.style.display = "block";
    }

    var articles= new Array (int);

    for(i=0;i<to_display;i++){
    articles[i]=(articles_length-(i+(page*to_display)));
    }
    for(i=articles_length;i>0;i--){
        if(articles.includes(i)){
            document.getElementById(i).style.display = "block";
        }
        else{
            document.getElementById(i).style.display = "none";
        }
    }
    page_of_page.innerHTML = "page "+page+" of "+last_page;
}

function addPage(){
    page++;  
    window.scrollTo(0, blog_offset);
    display(to_display);
}   

function subtractPage(){
    page--;  
    window.scrollTo(0, blog_offset);
    display(to_display);
}
function readmore(x){
    var num = x.parentNode.parentNode.id;
    var moreText = document.getElementById("more"+num);
    var btnText = document.getElementById("read_btn"+num);
    var offset = document.getElementById(num).offsetTop ;
    offset -=70;
    if (moreText.style.display === "none") {
      btnText.innerHTML = "Read less";  
      moreText.style.display = "inline";   
      
    } else {
      btnText.innerHTML = "Read more";  
      moreText.style.display = "none";
    }  
    window.scrollTo(0, offset);
}


  