const cautraloi = document.querySelectorAll('.cautraloi');
const submitBtn = document.getElementById('nut');
const quiz = document.getElementById('question');
let socaudung = 0;
let cauhoi_hientai = 0;

load_cauhoi();

function load_cauhoi()
{
    remove_answer();

    fetch('https://ayaya-toeic-iuh.click/Test/question/read.php')
    .then(res => res.json())
    .then(data => {
        document.getElementById('sum_quest').value = data['data'].length;
        console.log(data['data'].length);
        
        const cauhoi = document.getElementById('title');
        const mapart = document.getElementById('part');
        const a_cautraloi = document.getElementById('a_cautraloi');
        const b_cautraloi = document.getElementById('b_cautraloi');
        const c_cautraloi = document.getElementById('c_cautraloi');
        const d_cautraloi = document.getElementById('d_cautraloi');
        //hiển thị câu hỏi và câu trả lời :
        const get_cauhoi = data.data[cauhoi_hientai];
        console.log(get_cauhoi);
        stt.innerText = 'Câu '+get_cauhoi.MaCH;
        mapart.innerText='Part '+get_cauhoi.MaPart;
        cauhoi.innerText = get_cauhoi.Cauhoi;
        a_cautraloi.innerText = 'A. '+get_cauhoi.DapanA;
        b_cautraloi.innerText = 'B. '+get_cauhoi.DapanB;
        c_cautraloi.innerText = 'C. '+get_cauhoi.DapanC;
        d_cautraloi.innerText = 'D. '+get_cauhoi.DapanD;
        document.getElementById('caudung').value = get_cauhoi.DapanDung;
    })
    .catch(error => console.log(error));
}

//chọn câu trả lời :
function get_answer()
{
    let answer = undefined;
    cautraloi.forEach((cautraloi) =>{
        if(cautraloi.checked)
        {
            answer = cautraloi.id;
        }
    })
    return answer;
}

//bỏ câu trả lời cũ :
function remove_answer()
{
    cautraloi.forEach((cautraloi) =>{
        cautraloi.checked = false;
    })
}

//event click submit button :
submitBtn.addEventListener("click", () => {

    const answer = get_answer();
    console.log(answer);

    if(answer)
    {
        if(answer === document.getElementById('caudung').value)
        {
            socaudung++;
            console.log(socaudung);
        }
    }
    cauhoi_hientai++;
    load_cauhoi();
    
    if(cauhoi_hientai < document.getElementById('sum_quest').value){
        load_cauhoi();
    }
    else{
        const sum_quest = document.getElementById('sum_quest').value;
        //tổng kết số câu làm được đúng : 
        quiz.innerHTML = `
            <h2>Bạn đã đúng ${socaudung}/${sum_quest} câu hỏi !</h2>
            <button onclick="location.reload()">Làm lại</button>
        `
    }
})

