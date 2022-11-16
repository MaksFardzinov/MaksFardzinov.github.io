let table = document.createElement('table');
let th = document.createElement('thead');
let tb = document.createElement('tbody');
function generate_id(){
        let id ="";
        for(let i=0;i<8;i++){
                id+=(Math.floor(Math.random()*(9-0+1)));
        }
        return id;
}
function generate_set_of_letters(){
        let set_of_letters="";
        let alphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с',
                'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ь', 'ы', 'ъ', 'э', 'ю', 'я','А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё',
                'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ь',
                'Ы', 'Ъ', 'Э', 'Ю', 'Я']
        for(let i=0;i<8;i++ ){
                let number=(Math.floor(Math.random()*(65-0+1)));
                set_of_letters+=alphabet[number];
        }
        return set_of_letters;
}
function create_head(){
        let row_1 =document.createElement('tr');
        let head_1=document.createElement('th');
        head_1.innerHTML="номер";
        let head_2=document.createElement('th');
        head_2.innerHTML="id";
        let head_3=document.createElement('th');
        head_3.innerHTML="рандомный нобр букв ";
        row_1.appendChild(head_1);
        row_1.appendChild(head_2);
        row_1.appendChild(head_3);
        th.appendChild(row_1);
}
let rows =1;
function creat_body(){
        for(let l=0;l<2;l++){
                let row_2=document.createElement("tr");
                let row_2_value_1=document.createElement("td");
                row_2_value_1.innerHTML=rows;
                let row_2_value_2=document.createElement("td");
                row_2_value_2.innerHTML=generate_id();
                let row_2_value_3=document.createElement("td");
                row_2_value_3.innerHTML=generate_set_of_letters();
                row_2.appendChild(row_2_value_1);
                row_2.appendChild(row_2_value_2);
                row_2.appendChild(row_2_value_3);
                row_2.id=rows;
                row_2_value_2.id=rows+"l";
                rows++;
                tb.appendChild(row_2);
        }
}
let count =0;
let count_for_else=0;
function create_table(){
        if (count==0) {
                table.appendChild(th);
                table.appendChild(tb);
                document.getElementById('table').appendChild(table);
                create_head();
                creat_body();
                document.getElementById("create_table").removeAttribute("disabled");
                document.getElementById("add_row").removeAttribute("disabled");
                document.getElementById("delete_row").removeAttribute("disabled");
                count = 1;
        }
        else{
                let text=["таблица уже создана"," хватит сюда нажимать,таблица уже создана","я сказал хватит",
                        "ХВАТИТ","*****, ХВАТИТ"];
                if(count_for_else==1){
                        alert(text[count_for_else-1]);
                }
                else if(count_for_else==2){
                        alert(text[count_for_else-1]);
                }
                else if(count_for_else==3){
                        alert(text[count_for_else-1]);
                }
                else if(count_for_else==4){
                        alert(text[count_for_else-1]);
                }
                else if(count_for_else==5){
                        alert(text[count_for_else-1]);
                }
                else{
                        alert("хватит пожалуйста");
                }
        }
        count_for_else++;
}
function create_row(){
        let row_2=document.createElement("tr");
        let row_2_value_1=document.createElement("td");
        row_2_value_1.innerHTML=rows;
        let row_2_value_2=document.createElement("td");
        row_2_value_2.innerHTML=generate_id();
        let row_2_value_3=document.createElement("td");
        row_2_value_3.innerHTML=generate_set_of_letters();
        row_2.appendChild(row_2_value_1);
        row_2.appendChild(row_2_value_2);
        row_2.appendChild(row_2_value_3);
        row_2_value_2.id=rows+"l";
        row_2.id=rows;
        rows++;
        tb.appendChild(row_2);
}
function del_row(){
        const form = document.getElementById('form');
        const formData = new FormData(form);
        let idd=formData.get("write_number");
        if (document.getElementById(idd)){
                const del=document.getElementById(idd);
                tb.removeChild(del);
        }
        else{
                alert("введите номер корректно")
        }
}

