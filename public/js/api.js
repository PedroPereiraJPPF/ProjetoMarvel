timestamp = '1';
publicKey = '8371bb45698096d61563a19f63d5ba77';
private = '02cab7eba6dfdf55bf03b1cf1a494dd571990250';
hash = "6f1d1a4bf7aad9d30f45279f7caf11c2";

function Api(limit){
    link = `https://gateway.marvel.com/v1/public/comics?ts=${timestamp}&apikey=${publicKey}&hash=${hash}&limit=${limit}`
    console.log(link)
    fetch(link).
    then((response) => {
        return response.json()
    }).then((data) =>{
        let div = document.querySelector('.hqContainer');
        var $ApiRetorno = data.data.results;
        console.log($ApiRetorno);
        carregarHq($ApiRetorno, div)
    }).catch((err) =>{
        console.log(err)
    })
}
var chamadas = 20
window.addEventListener('scroll', ()=>{
    if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight){
        Api(chamadas)
        chamadas += 20;
    }
})
Api(20)

// pegar dados da api
function carregarHq($ApiRetorno, div){
    $ApiRetorno.forEach(element => {
        const srcImage = element.thumbnail.path + '.' +element.thumbnail.extension;
        const testeImagem = srcImage.split('/');
        const acharErro = testeImagem.find(element => element == 'image_not_available.jpg');
        const id = element.id;
        const hqName = element.title;
        // filtrar imagens undefined
        if(acharErro == undefined){
            gerarHq(srcImage, hqName, div, id);
        }
    });
}
// renderizar hq
function gerarHq(srcImage, hqName, div, id){
    const divPai = document.createElement('div')
    const divFilho = document.createElement('div')
    const textName = document.createElement('text')
    const img = document.createElement('img')
    const a = document.createElement('a')


    textName.textContent = hqName
    img.src = srcImage
    img.classList.add('hqImagem')
    a.href=`/detalhes/${id}`
    

    a.appendChild(img)
    divFilho.appendChild(a)
    divFilho.appendChild(textName)
    divPai.appendChild(divFilho)
    div.appendChild(divPai)
    divPai.classList.add('hq')
}
