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
        window.addEventListener('scroll', ()=>{
            if(window.scrollY + window.innerHeight >= document.documentElement.scrollHeight){
                carregarHq($ApiRetorno, div)
            }
        })
    }).catch((err) =>{
        console.log(err)
    })
}

function ajustarLimite(limit=100){
    return limit;
}
Api(ajustarLimite())
// pegar dados da api
function carregarHq($ApiRetorno, div){
    $ApiRetorno.forEach(element => {
        const srcImage = element.thumbnail.path + '.' +element.thumbnail.extension;
        const testeImagem = srcImage.split('/');
        const acharErro = testeImagem.find(element => element == 'image_not_available.jpg');
        const id = element.id;
        const hqName = element.title;
        const hqDescription = element.description;
        // filtrar imagens undefined
        if(acharErro == undefined){
            gerarHq(srcImage, hqName, div, hqDescription);
        }
    });
}
// renderizar hq
function gerarHq(srcImage, hqName, div, hqDescription){
    const divPai = document.createElement('div')
    const divFilho = document.createElement('div')
    const textName = document.createElement('text')
    const textDescription = document.createElement('text')
    const img = document.createElement('img')
    const divFilho2 = document.createElement('div')

    textName.textContent = hqName
    textDescription.textContent = hqDescription
    img.src = srcImage
    img.classList.add('hqImagem')
    divFilho2.classList.add('descrição')


    divFilho.appendChild(img)
    divFilho.appendChild(textName)
    divFilho2.appendChild(textDescription)
    divPai.appendChild(divFilho)
    divPai.appendChild(divFilho2)
    div.appendChild(divPai)
    divPai.classList.add('hq')
}
