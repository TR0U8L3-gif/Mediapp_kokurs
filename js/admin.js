        textarea1 = document.querySelector("#disease_name");
        textarea1.addEventListener('input', autoResize, false);

        textarea2 = document.querySelector("#disease_description");
        textarea2.addEventListener('input', autoResize, false);

        textarea3 = document.querySelector("#disease_symptoms");
        textarea3.addEventListener('input', autoResize, false);

        textarea4 = document.querySelector("#disease_tips");
        textarea4.addEventListener('input', autoResize, false);

        textarea5 = document.querySelector("#title");
        textarea5.addEventListener('input', autoResize, false);

        textarea6 = document.querySelector("#introduction");
        textarea6.addEventListener('input', autoResize, false);

        textarea7 = document.querySelector("#expansion");
        textarea7.addEventListener('input', autoResize, false);
     
        var upload = false;
        btn = document.querySelector("#disease_btn");
        info = document.querySelector("#disease_info");

        function autoResize() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight-20) + 'px';
        }

        window.onload = function() {
            textarea1.value="";
            textarea2.value="";
            textarea3.value="";
            textarea4.value="";
            textarea5.value="";
            textarea6.value="";
            textarea7.value="";
        };
            
        constrainInput = (event) => { 
            event.target.value = event.target.value.replace(/[\r\n\v]+/g, '')
        }
              
        document.querySelectorAll('textarea').forEach(el => {
        el.addEventListener('keyup', constrainInput)
        })
        
        function illnes_isset(){

            if(illnes.some( x => textarea1.value.includes(x))){
                upload=false;
            } 
            else{
                upload=true;
            }
            

            if(upload){
                btn.style.display = "inline-block";
                info.innerHTML = "";
            }
            else{
                btn.style.display = "none";
                info.innerHTML = '<span style="color:red;">Example with that name already exists!</span><br>';
            }
        }

        