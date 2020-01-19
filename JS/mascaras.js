//mascara CPF

function maskCPF(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarCPF(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 12) { //CPF

        //Coloca um ponto entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        //Coloca um hífen entre o terceiro e o quarto dígitos
        v = v.replace(/(\d{3})(\d)/, "$1-$2")

    }

    return v
}

//MASCARA CNPJ
function maskCNPJ(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarCNPJ(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 18) {

        v = v.replace(/(\d{2})(\d)/, "$1.$2")

        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        v = v.replace(/(\d{3})(\d)/, "$1/$2")

        v = v.replace(/(\d{4})(\d)/, "$1-$2")

    }

    return v
}

//Mascara telefone 

function maskPhone(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarPhone(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 18) {

        v = v.replace(/(\d{0})(\d)/, "$1($2")

        v = v.replace(/(\d{2})(\d)/, "$1)$2")

        v = v.replace(/(\d{5})(\d)/, "$1-$2")

    }

    return v
}


//Mascara telefone 

function maskPctg(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarPctg(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 4) {
        if (v.length > 3) {
            v = v.replace(/(\d{2})(\d)/, "$1,$2")
        } else {
            v = v.replace(/(\d{1})(\d)/, "$1,$2")
        }
    } else {
        v = v['0'] + v['1'] + "," + v['2'] + v['3']
    }

    return v
}

function maskBTC(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarBTC(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 18) {

        v = v.replace(/(\d{5})(\d)/, "$1,$2")

    }

    return v
}

function maskHour(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarHour(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")

    if (v.length <= 4 && v['0'] <= "2" && v['2'] <= "5") {

        v = v.replace(/(\d{2})(\d)/, "$1:$2")
    } else if (v.length > 4) {

        v = v['0'] + v['1'] + ":" + v['2'] + v['3']
    } else if (v['2'] > "5") {

        v = v['0'] + v['1'] + ":5"
    } else if (v['0'] > "2") {

        v = "0" + v;
    }

    return v
}

function maskPeso(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarPeso(v) {

    //Remove tudo o que não é dígito
    v = v.replace(/\D/g, "")
    if (v.length <= 6) {
        if (v.length <= 4) {

            v = v.replace(/(\d{1})(\d)/, "$1.$2")
        } else if (v.length <= 5) {

            v = v.replace(/(\d{2})(\d)/, "$1.$2")
        } else {

            v = v.replace(/(\d{3})(\d)/, "$1.$2")
        }
    } else {
        v = v[0] + v[1] + v[2] + "." + v[3] + v[4] + v[5]
    }

    return v
}

function maskRG(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarRG(v) {
    v = v.replace(/\D/g, "")

    if (v.length <= 9) {

        v = v.replace(/(\d{2})(\d)/, "$1.$2")

        v = v.replace(/(\d{3})(\d)/, "$1.$2")

        v = v.replace(/(\d{3})(\d)/, "$1-$2")

    }

    return v
}

function maskPIS(o, f) {
    v_obj = o
    v_fun = f
    setTimeout('execmascara()', 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function ajustarPIS(v) {
    v = v.replace(/\D/g, "")

    if (v.length <= 11) {

        v = v.replace(/(\d{10})(\d)/, "$1-$2")

        v = v.replace(/(\d{8})(\d)/, "$1.$2")

        v = v.replace(/(\d{3})(\d)/, "$1.$2")

    }

    return v
}