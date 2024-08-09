const nhap = document.getElementById('nhap');
const search_btn = document.getElementById('search_btn');
const searchInput = document.querySelector('.search_input')
const not_found = document.querySelector('.not_found');
const not_exist_example = document.querySelector('.not_example');
const vocabulary_show = document.querySelector('.vocabulary');
const phonetic_show = document.querySelector('.phonetic');
const definition_show = document.querySelector('.definition');
const definition2_show = document.querySelector('.definition2');
const example_show = document.querySelector('.example');
const example2_show = document.querySelector('.example2');
const audio_show = document.querySelector('.audio');
const partOfSpeech_show = document.querySelector('.PoS');
const partOfSpeech2_show = document.querySelector('.PoS2');
const synonyms_show = document.querySelector('.dongnghia');
const antonyms_show = document.querySelector('.trainghia');
const synonyms2_show = document.querySelector('.dongnghia2');
const antonyms2_show = document.querySelector('.trainghia2');

async function dataGet(word)
{
    const url = `https://api.dictionaryapi.dev/api/v2/entries/en/${word}`;
    const response = await fetch(url);
    const data = await response.json();

    if (!data.length) {
        //not_found.innerText = "Sorry that word not found !";
        alert("Sorry that word not found!");
        return;
    } 
    else 
    {
        console.log(data);
        let vocabulary = data[0].word;
        let phonetic = data[0].phonetic;
        let tu_dong_nghia = data[0].meanings[0].synonyms;
        let tu_trai_nghia = data[0].meanings[0].antonyms;
        let partOfSpeech = data[0].meanings[0].partOfSpeech;
        let vidu = data[0].meanings[0].definitions[0].definition.example;
        
        const meanings = data[0].meanings[0].definitions;
        let audioHTML = '';
        let audios = data[0].phonetics;
        let result = '';
        let result_PoS = '';
        if (data[0].meanings.length > 1) 
        {
            for(let i = 0; i < data[0].meanings.length; i++) 
            {
                const pos = data[0].meanings[i];
                result_PoS = result_PoS + (i + 1) + ". " + pos.partOfSpeech + "\n";
            }
            partOfSpeech_show.innerText = result_PoS;
        }
        else
        {
            partOfSpeech_show.innerText = partOfSpeech;
        }
        vocabulary_show.innerHTML = vocabulary;
        
        /*if(data[0].meanings.length > 1)
        {
            if(data[0].meanings[0].partOfSpeech === 'noun')
            {
                vocabulary_show.innerHTML = vocabulary + "(danh từ)";
            }
            else if(data[0].meanings[0].partOfSpeech === 'verb')
            {
                vocabulary_show.innerHTML = vocabulary + "(động từ)";
            }
            else if(data[0].meanings[0].partOfSpeech === 'adverb')
            {
                vocabulary_show.innerHTML = vocabulary + "(trạng từ)";
            }
            else if(data[0].meanings[0].partOfSpeech === 'adjective')
            {
                vocabulary_show.innerHTML = vocabulary + "(tính từ)";
            }
        }*/
        //vocabulary_show.innerHTML = vocabulary;
        // phiên âm
        if(phonetic)
        {
            phonetic_show.innerText = phonetic;
        }
        else
        {
            phonetic_show.innerHTML = "<b style='color: red;'>This word does not have a phonetic.</b";
        }
        
        //từ đồng nghĩa và trái nghĩa của loại từ 1:
        synonyms_show.innerText = tu_dong_nghia ? tu_dong_nghia : "This word does not have synonyms.";
        antonyms_show.innerText = tu_trai_nghia ? tu_trai_nghia : "This word does not have antonyms.";
        
        //từ đồng nghĩa và trái nghĩa của loại từ 2:
        let dong_nghia2 = data[0].meanings[1].synonyms;
        let trai_nghia2 = data[0].meanings[1].antonyms;
        if(dong_nghia2)
        {
            synonyms2_show.innerHTML = "<span style='font-weight: bolder;'>Từ đồng nghĩa:</span><br>" + dong_nghia2;
        }
        else
        {
            synonyms2_show.innerHTML = "<b style='color: red;'>This part of speech does not have synonyms.</b";
        }
        
        if(trai_nghia2)
        {
            antonyms2_show.innerHTML = "<span style='font-weight: bolder;'>Từ trái nghĩa:</span><br>" + trai_nghia2;
        }
        else
        {
            antonyms2_show.innerHTML = "<b style='color: red;'>This part of speech does not have antonyms.</b";
        }
        
        //âm thanh
        audios.forEach(audio => {
            if(audio.audio)
            {
                if(audio.audio.endsWith("uk.mp3")){
                    document.querySelector("#audio-uk").innerHTML = "<span style='color: red;'></span>";
                    audioHTML = audioHTML + `<span style='color: red; font-weight: bolder; font-size: 18px;'>UK</span> <audio style="display: block; text-align: center; padding: 10px;" controls><source src="${audio.audio}"></audio>`;
                }
                else if(audio.audio.endsWith("us.mp3"))
                {
                    document.querySelector("#audio-us").innerHTML = "<span></span>";
                    audioHTML = audioHTML + `<span style='color: red; font-weight: bolder; font-size: 18px;'>US</span> <audio style="display: block; text-align: center; padding: 10px;" controls><source src="${audio.audio}"></audio>`;
                }
                
            }
        })
        audio_show.innerHTML = audioHTML;
        
        
        // ý nghĩa (nếu chỉ có 1 nghĩa)
        for(let i = 0; i < meanings.length; i++) 
        {
          const meaning = data[0].meanings[0].definitions[i];
          // Hiển thị giá trị của meaning
          result = result + (i + 1) + ". " + meaning.definition + "\n";
        }
        definition_show.innerText = result;
        
        // ý nghĩa (nếu có nhiều hơn 1 nghĩa)
        let result_def2 = "";
        for(let i = 0; i < meanings.length; i++) 
        {
            const def2 = data[0].meanings[1].definitions[i];
            if(def2 && Array.isArray(def2)) 
            {
                for(let j = 0; j < def2.length; j++) 
                {
                  result_def2 = result_def2 + (i + 1) + "." + def2[j].definition + "<br>";
                }
            } 
            else if(def2) 
            {
                result_def2 = result_def2 + (i + 1) + "." + def2.definition + "<br>";
            }
        }


        /*for(let i = 0; i < meanings.length; i++) 
        {
          const def2 = data[0].meanings[1].definitions[i];
          // Hiển thị giá trị của meaning
          //result_def2 = result_def2 + (i + 1) + ". " + def2.definition + "<br>";
            for (let j = 0; j < def2.length; j++) {
              result_def2 = result_def2 + (i + 1) + "." + def2[j].definition + "<br>";
            }
        }*/
        definition2_show.innerHTML = "<span style='font-weight: bolder;'>Định nghĩa:</span><br>" + result_def2;
        
        // ví dụ 1
        let mean = data[0].meanings[0].definitions;
        let kq = "";
        let example = "";
        for(let i = 0; i < mean.length; i++) 
        {
          const definition = meanings[i].definition;
          if (meanings[i].example) 
          {
            example = meanings[i].example;
          }
          kq = kq + (i + 1) + ". " + definition + "\n";
        }
        if(example) 
        {
            example_show.innerText = example;
        } 
        else 
        {
            example_show.innerHTML = "<b style='color: red;'>This word does not have an example.</b";
        }
        
        // ví dụ 2
        let vi_du = data[0].meanings[1].definitions;
        let ketqua = "";
        let ex = "";
        for (let i = 0; i < vi_du.length; i++) 
        {
            const defin = vi_du[i].definition;
            if (vi_du[i].example) 
            {
                ex = vi_du[i].example;
            }
            ketqua = ketqua + (i + 1) + ". " + defin + "<br>";
        }
        if(ex) 
        {
            example2_show.innerHTML = "<span style='font-weight: bolder;'>Ví dụ:</span>" + " " + ex;
        } 
        else 
        {
            example2_show.innerHTML = "<b style='color: red;'>This word does not have an example.</b>";
        }
        //definition2_show.innerHTML = "<span style='font-weight: bolder;'>Định nghĩa:</span><br>" + ketqua;

    }
}

search_btn.addEventListener("click", function search(e){
    e.preventDefault();

    const word = nhap.value;
    if(word === "")
    {
        alert("Hãy nhập từ cần tìm !");
        return;
    }
    else
    {
        dataGet(word);
    }
});
////// nếu người dùng nhập từ và enter
searchInput.addEventListener('keyup', function(e) {
    const word = nhap.value;
    if(word === "")
    {
        alert("Hãy nhập từ cần tìm !");
        return;
    }
    else
    {
        if(e.keyCode === 13) {
            e.preventDefault();
            dataGet(word);
        }
    }
});

