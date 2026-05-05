function toggleTheme(){
    document.body.classList.toggle("light-mode");

    if(document.body.classList.contains("light-mode")){
        localStorage.setItem("theme","light");
    }else{
        localStorage.setItem("theme","dark");
    }
}

window.addEventListener("load",function(){
    if(localStorage.getItem("theme")==="light"){
        document.body.classList.add("light-mode");
    }
    revealElements();
    animateCounters();
});

window.addEventListener("scroll",function(){
    revealElements();
});

function revealElements(){
    const reveals=document.querySelectorAll(".reveal");
    reveals.forEach(function(el){
        let top=el.getBoundingClientRect().top;
        let visible=window.innerHeight-100;
        if(top<visible){
            el.classList.add("active");
        }
    });
}

function confirmDelete(){
    return confirm("Delete this event permanently?");
}

function animateCounters(){
    let counters=document.querySelectorAll(".stat-box h2");

    counters.forEach(counter=>{
        let target=counter.innerText.replace('+','').replace('%','');
        let count=0;

        let update=setInterval(()=>{
            count++;
            counter.innerText=count + (counter.innerText.includes('%')?'%':'+');

            if(count>=target){
                clearInterval(update);
                counter.innerText=target + (counter.innerText.includes('%')?'%':'+');
            }
        },20);
    });
}
<script>
setTimeout(() => {
    let popup = document.querySelector('.popup');
    if(popup){
        popup.style.opacity = '0';
        popup.style.transform = 'translateX(100%)';
        setTimeout(()=> popup.remove(), 500);
    }
}, 3000);
</script>