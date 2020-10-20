const mic = document.querySelector("#mic");
const send = document.querySelector("#send");
const assistant_info = document.getElementById("assistant_info");
let chatareamain = document.querySelector('.chatarea-main');
let chatareaouter = document.querySelector('.chatarea-outer');


let which_message = 0;
let last_message = "";

let hello_a = ["Hello, I am Sam", "Hi, I am a Robot", "Hello, My name is Sam"];
let help_a = ["How may i assist you?","How can i help you?","What i can do for you?"];
let idk_a = ["I'm sorry, I didn't understand","Sorry, I didn't understand it"];
let thank_a = ["Most welcome","Not an issue","Its my pleasure","Mention not"];
let closing_a = ["Ok bye-bye","As you wish, bye take-care","Bye-bye, see you soon.."];
let like_a = ["I like you too","You make me happy :)","I always look forward to seeing you"];
let intro_a =["I am your medical assistant, I will answer all your questions. I will help you recover quickly, write down your prescriptions from doctors, remind you of doctor appointments and keep your health diary."];
let meet_a = ["The pleasure is all mine"];

let hello = ["hello","hi","good afternoon","good morning","good evening"];
let intro = ["your goals","your destiny","your purpose","your fate","your allocation","your goal","you were made for","what can you do","what do you do"];
let help = ["help"];
let like_you = ["like you","love you"]
let meet = ["nice to meet you", "nice to see you", "nice to hear you"];



const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const speech = new SpeechSynthesisUtterance();
speech.lang  = "en-GB";
const recognition = new SpeechRecognition();
recognition.continuous = false;
recognition.lang  = "en-GB";
recognition.interimResults = false;
recognition.maxAlternatives = 1;
var transcript = "";
var message = "";
var delete_info = true;

var d = new Date();

var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";

var m = new Array();
m[0] = "January";
m[1] = "February";
m[2] = "March";
m[3] = "April";
m[4] = "May";
m[5] = "June";
m[6] = "July";
m[7] = "August";
m[8] = "September";
m[9] = "October";
m[10] = "November";
m[11] = "December";

mic.addEventListener("click",() => {
recognition.start();
});

send.addEventListener("click",() => {
window.speechSynthesis.cancel();
if(document.getElementById("question").value === ""){
    transcript = "help"; 
}
else{
transcript = document.getElementById("question").value;
chatareamain.appendChild(showusermsg(transcript));
}
document.getElementById("question").value="";
check();
});

recognition.onresult = (e) =>{
transcript = e.results[0][0].transcript.trim();
chatareamain.appendChild(showusermsg(transcript));
check();
};

function showusermsg(usermsg){
    let output = '';
    output += `<div class="chatarea-inner user">${usermsg}</div>`;
    chatareaouter.innerHTML += output;
    return chatareaouter;
}

function showchatbotmsg(chatbotmsg){
    which_message++;
    last_message = "chatbot_message"+ which_message;
    let output = '';
    output += `<div id="chatbot_message${which_message}"class="chatarea-inner chatbot">${chatbotmsg}</div>`;
    chatareaouter.innerHTML += output;  
    return chatareaouter;   
}
function showchatbotmsg_video(video){
    which_message++;
    last_message = "chatbot_message"+ which_message;
    let output = '';
    output += `<div id="chatbot_message${which_message}"class="chatarea-inner chatbot"><iframe width="100%" height="220" src="${video}?autoplay=0" allow='autoplay' frameborder="0" allowfullscreen></iframe></div>`;
    chatareaouter.innerHTML += output;  
    return chatareaouter;   
}

function check(){

    if(delete_info){
        assistant_info.parentNode.removeChild(assistant_info);
        delete_info=false;
    }
    transcript=transcript.toLowerCase();
            if(find_index(transcript)>-1){
                var index = find_index(transcript);
                if(transcript.includes("descripction")||transcript.includes("describe")||transcript.includes("tell me something about")||transcript.includes("i have")){
                message=description[index];
                }
                else if(transcript.includes("symptom")||transcript.includes("symptoms")||transcript.includes("how can i recognize")||transcript.includes("recognize")){
                message=symptoms[index];
                }
                else if(transcript.includes("prevention")||transcript.includes("tips")||transcript.includes("prevent")||transcript.includes("how to prevent")){
                message=prevention_tips[index];
                }
                else if (illnes[index].includes(transcript)){
                message=description[index];   
                }
                else{
                message=idk_a[Math.floor(Math.random() * idk_a.length)];
                }
                speech.text = message;         
            }
            else if(transcript.includes("what is love")){
                message= "Haddaway - What Is Love";
                speech.text = message;
                showchatbotmsg_video("https://www.youtube.com/embed/HEXWRTEbj1I");
            }
            else if(transcript.includes("love")){
                message= "When one falls in love, blood flow increases in this area, which is the same part of the brain responsible for drug addiction and obsessive-compulsive disorders. Dopamine creates feelings of euphoria while adrenaline and norepinephrine are responsible for the pitter patter of the heart";
                speech.text = message;
            }
            else if(transcript.includes("never gonna give you up")||transcript.includes("give up")){
                message= "Rick Astley - Never Gonna Give You Up";
                speech.text = message;
                showchatbotmsg_video("https://www.youtube.com/embed/dQw4w9WgXcQ");
            }
            else if(transcript.includes("diseases")||transcript.includes("illnes")||transcript.includes("illneses")){
                message="";
                for(var i=0; i<illnes.length;i++)
                {
                    message+=illnes[i]+", ";
                }
                speech.text = message;
            }
            else if(transcript.includes("time")){
                message=((d.getHours() < 10)?"0":"") + d.getHours() +":"+ ((d.getMinutes() < 10)?"0":"") + d.getMinutes();

                speech.text = message;
            }
			else if(transcript.includes("year")){
                message=d.getFullYear();
                speech.text = message;
                
            }
			else if(transcript.includes("day")){
                message=weekday[d.getDay()];
                speech.text = message;
                
            }
			else if(transcript.includes("month")){
                message=m[d.getMonth()];
                speech.text = message;
                
            }
			else if(transcript.includes("date")){
				var month = d.getMonth()+1;
				var day = d.getDate();
                if(month<10){
					month = "0"+month;
				} 
				if(day<10){
					day = "0"+day;
				}
				message=d.getFullYear()+"."+month+"."+day;
                speech.text = message;
                
            }
            else if(hello.some( x => transcript.includes(x))){
                message= hello_a[Math.floor(Math.random() * hello_a.length)];
                speech.text = message;             
            } 
            else if(transcript.includes(help)){
                message=help_a[Math.floor(Math.random() * help_a.length)];
                speech.text = message;
            }
            else if(intro.some( x => transcript.includes(x))){
                message=intro_a;
                speech.text = message;
            }  
            else if(meet.some( x => transcript.includes(x))){
                message=meet_a;
                speech.text = message;
            } 
            else if(like_you.some(x => transcript.includes(x))){
                message=like_a[Math.floor(Math.random() * like_a.length)];
                speech.text = message;
                
            }
            else{
                message=idk_a[Math.floor(Math.random() * idk_a.length)];
                speech.text = message;  
            }

    window.speechSynthesis.speak(speech);
    chatareamain.appendChild(showchatbotmsg(speech.text));
    transcript = "";

    var outHeight = document.getElementById("chat_out").clientHeight;
    var clientHeight = document.getElementById("chat").clientHeight;
    
    if(outHeight>clientHeight){
    $('#chat').scrollTop(outHeight);   
    }
}
