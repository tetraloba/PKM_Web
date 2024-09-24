function print_content(){
    let text_area = document.getElementById('text_area');
    for (line of text_area.children) {
        console.log(line.textContent);
    }
    // console.log(text_area.textContent);
}

window.onload = print_content; // debug

function post_content(){
    const form = document.createElement('form');
    form.action = '';
    form.method = 'post';

    let text_area = document.getElementById('text_area');
    let index = 0;
    for (line of text_area.children) {
        const data = document.createElement('input');
        data.value = line.textContent;
        data.name = 'lines[' + index + ']';
        form.appendChild(data);
        index++;
    }

    document.body.appendChild(form); // documentに紐づけないとエラーが出る "Form submission canceled because the form is not connected"
    form.submit();
}

function create_content(){
    const date = new Date();
    const page_path = date.toISOString().replaceAll('-', '').replaceAll('T', '').replaceAll(':', '').substring(0,14) + '.txt'; // 日時.txt
    const form = document.createElement('form');
    form.action = './page.php?page=' + page_path; // /page.php?=日付.txt
    form.method = 'post';

    /* 3行の空行を追加 */
    const data = document.createElement('input');
    data.value = "\n";
    data.name = 'lines[0]';
    form.appendChild(data);
    data.name = 'lines[1]';
    form.appendChild(data);
    data.name = 'lines[2]';
    form.appendChild(data);

    document.body.appendChild(form);
    form.submit();
}
