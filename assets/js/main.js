$(window).ready(function(){
  
    //update Jela
$('#updateJeloBtn').click(updateJela)

//za cenu iput polje sklanjanje disabled
$('.cenaUpdate').click(inputCena);

localStorage.removeItem("price")
localStorage.removeItem("sort")
localStorage.removeItem("tags")
setItemToLocalStorage("brojPag",1);
// console.log($('#insertJeloPic'))
//update profila kroisnika
$('#updateProfile').click(updateProfile)
//  let pic=$('.img')[0].name
//  console.log(pic)

//potvrda porudzbine
$('#krajKorpa').click(krajKorpa)

//prikaz porudzbina
//if(window.location.href.includes("Admin%20panel") ){
	prikaziPoruke({tabela:"poruke"})
	$('.obrisiAdmin').click(obrisiAdmin)
	// prikazKorpeDash();
//}

//upis broja koliko jela dodatih ima u korpu
brojKorpa();
$brojElemenataUKorpi=getItemFromLocalStorage("korpa");
if($brojElemenataUKorpi){
	$brojElemenataUKorpi=$brojElemenataUKorpi.length;
	$('#korpaPlus').text($brojElemenataUKorpi-1)
}

//prikaz svih kategorija na strani admin / kategorije
if(window.location.href.includes("Kategorije")){
	callBackAjax("models/adminPanel/selectIdRod.php", "POST", {objKat:0,tabela:"kategorije"}, function(data){
		let ispis=`<option value="0">Choose category</option>`
		for(d of data){
		ispis+=`<option value="${d.idKat}">${d.naziv}</option>`
		}
		$('#podKatAdmin').html(ispis)})
	prikaziKat({idRod:0,tabela:"kategorije"})
	prikaziPodKat({idRod:1,tabela:"kategorije"})


}
//prikaz svih admin / kolicine
if(window.location.href.includes("Kolicine")){

prikaziKolicine({tabela:"kolicina"})}
//prikaz svih  admin / tags
if(window.location.href.includes("Tags")){

prikaziTags({tabela:"podkategorije"})}
//prikaz svih strani admin / users
if(window.location.href.includes("Korisnici")){
prikaziUsers({tabela:"korisnik"});
}
//prikaz svih uloga na strani admin
if(window.location.href.includes("Uloge")){
	prikaziUloge({tabela:"uloge"})
}
//prikaz menija na strani admin
if(window.location.href.includes("Meni")){
	callBackAjax("models/adminPanel/selectIdRod.php", "POST", {objKat:0,tabela:"meni"}, function(data){
		let ispis=`<option value="0">Choose category</option>`
		for(d of data){
		ispis+=`<option value="${d.idMeni}">${d.naziv}</option>`
		}$('#podKatAdmin').html(ispis)})
	prikaziMeni({tabela:"meni",idRod:0})
	prikaziPodMeni({tabela:"meni",idRod:1})


}

//prikaz podkategorija na strani admin/kategorije
// prikaziPodKat({})



//plus i minu spovecavanje vrednosti za quantity
$('.quantity-left-minus').click(smanji)
$('.quantity-right-plus').click(povecaj)


	//upis vrednosti za range
$('#customRange1').on("change",function(){
	let val=$('#customRange1').val()
$('#range').text(val+" din")

setItemToLocalStorage("price",val)
setItemToLocalStorage("brojPag",1);
let obj=objekat();
filtriraj(obj);	
})


//prikaz korpe
if(window.location.href.includes("Cart")){
	prikazKorpe();
}


//change na sortiranje na stranici shop
$('#sort').change(function(){
	let val=$('#sort').val()
	if(val!=0){
		setItemToLocalStorage("sort",val)
setItemToLocalStorage("brojPag",1);
		let obj=objekat();
	filtriraj(obj);	
	}
	else{
		alert("You must choose something else of order by")
	}

})

	//blok za log in i registraciju
$('.log, .icon-close').click(close)

//prikaz login ili signup
$('#r').hide()
$('.div').click(div)

	//kod za registraciju
$('#reg').click(registracija)
$('#insertKorisnika').click(registracija)

	//kod za login
$('#login').click(login)

	//kod za logout
$('.logout').click(logout)

	//odabir kategorije u insert proizvoda
$('#insertJeloKat1').change(kategorijaRoditelj)

	//insert jela u bazu
$('#insertJeloBtn').click(insertJela)


	//insert podkategorije
$('#insertTag').click(insertPodKategorije)

	//dodavanje polja za cenu u odnosu na kolicinu
$('.insertJeloKolChb').click(dodavanjePoljaCena)

	//klik za brisanje jela na admin panelu
$('.deleteJela').click(adminPanelDeleteJela)

	//update informacija o restoranu na strani admin panel
$('.updateRestoranInfo').blur(updateRestoranInfo)

// $('#updateTimeRestoran').click(function(){alert($('#from').val())})

//insert na admin panelu
$('.insertAdminKat').click(insertAdminKat)


//insert poruke u bazu
$("#contact").click(insertPoruke)

//update statusa porudzbine
$('.updateStatus').click(updateStatus)

//insert podkategorija
$('#podKat').click(insertAdminKat)
$('#podMeni').click(insertAdminKat)
//update radnih dana restorana
$('#updateDaysRestoran').click(updateRestoranInfo)

//update radnog vremena restorana
$('#updateTimeRestoran').click(updateRestoranInfo)

//klik na tagove menjanje boje pozadine
$( ".tag-cloud-link" ).click(function(e){
	e.preventDefault();
	$( this ).toggleClass( "tag" );
	let podatak=this.dataset.form;
	 podatak = podatak.split("podKat")[1];
	 let tags=getItemFromLocalStorage("tags");
	 let tag=[];
              if(tags){
					if(!tags.includes(podatak)){
						tag.push(podatak)
					}
					tags.map(function(x){if(x!=podatak){tag.push(x)}})
					setItemToLocalStorage("tags",tag)
					setItemToLocalStorage("brojPag",1);

					let obj=objekat();
					filtriraj(obj);
				
			  }
			  else{
					let tag=[];
					tag[0]=podatak;
					setItemToLocalStorage("tags",tag)
					setItemToLocalStorage("brojPag",1);
					let obj=objekat();
					filtriraj(obj);
			  }      

});



//brisanje sa block liste
$('.RemoveBlock').click(RemoveBlock)

//filter
filtriraj({parametar:"all",broj:1});
setItemToLocalStorage("kategorije","all")
// console.log(getItemFromLocalStorage("kategorije"))

//ispisivanje podkategorija na klik
$('.filterKat').click(function(){

let parametar=this.dataset.kat
setItemToLocalStorage("kategorije",parametar)
setItemToLocalStorage("brojPag",1);
let obj=objekat();
filtriraj(obj);	

//ispisivanje podkategorija na klik
if(parametar!="all"){
	$podKategorija=callBackAjax("models/podkategorije.php", "POST", {dugme:true,parametar:parametar}, function(data){
		let ispis=``;
		for(d of data){
			// console.log(d)
			ispis+=`<li class="nav-link"><a class="filtriranjeIdRod"  data-idrod="${d.naziv}" href="#">${d.naziv}</a></li>`
		}
		$('#idRoditelj').html(ispis)

		//filtriranje na osnovu idRoditelja
$('.filtriranjeIdRod').click(function(e){
	e.preventDefault();
	// console.log(obj)
	let idRod=this.dataset.idrod;
	setItemToLocalStorage("kategorije",idRod)
setItemToLocalStorage("brojPag",1);

	let obj=objekat();
	filtriraj(obj);
})
	
		})}
else{
	$('#idRoditelj').html("")}})



	//prikaz Cene Za Kolicinu u odnosu na to sta je odabrano od kolicine u dropdown listi
$('#prikazCeneZaKolicinu').change(prikaziCenu);

})

//insert i provera sa strane kontakt
function insertPoruke(e){
e.preventDefault();
let email=$('#emailContact').val()
let subject=$('#subject').val()
let message=$('#message').val()
var regEmail=/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/
let regSubject=/^[A-z(\s)*]{4,}$/
let regMessage=/^([A-z][\.\-\,]*(\s)*)+$/
let greske=[]
greske.push(provera(email,regEmail,"something@something.something","regPorukaEmail"))
greske.push(provera(subject,regSubject,"The subject of product can only be written in letters, minimum 4","regSubject"))
greske.push(provera(message,regMessage,"The message of product can only be written in letters and contain - or . or , ","regMessage"))
if(!greske.includes(false)){
	callBackAjax("models/insertContact.php", "POST", {email:email,subject:subject,message:message}, function(data){
alert(data)
location.reload();
	})
}

}
//sklanjanje disabled polja za cenu kada se cekira kolicina
	function inputCena(){
		let val=this.value
		// alert(val)
// 		console.log(this.checked)
		if(this.checked){
			$('.'+val).removeAttr('disabled');
			$('.'+val).addClass('updatetJeloCena');

		}
		else{
			$('.'+val).attr('disabled','disabled');
			$('.'+val).removeClass('updatetJeloCena');

		}
	
	}

//insert na admin panelu
function insertAdminKat(e){
e.preventDefault();
let value=$('.textInsertAdmin').val()
// alert(value)

let reg=/^[A-z(\s)*]+$/
let tabela=this.dataset.tabela
let obj={tabela:tabela}
let greske=[];

if(this.id=="podKat" || this.id=="podMeni"){
	value=$('#insertJeloName').val()
	// alert(value)
let mainKat=$('#podKatAdmin').val()
if(mainKat!=0){
	obj.dropdownCat=mainKat;
}
else{alert("Vrednost iz dropdown liste mora da se izabere za glavnu kat")
greske.push(false)}
}
	if(!reg.test(value)){
		alert("Polje moze da sadrzi samo slova!")
		greske.push(false)
		}
obj.value=value;
if(!greske.includes(false)){

	callBackAjax("models/adminPanel/insertAdmin.php", "POST", obj, function(data){
		alert(data)
	$('#insertJeloName').val("")
	$('.textInsertAdmin').val("")
	if(window.location.href.includes("Kategorije")){
		prikaziKat({idRod:0,tabela:tabela})
		prikaziPodKat({idRod:1,tabela:tabela})

	}
	if(window.location.href.includes("Kolicine")){
		prikaziKolicine({tabela:tabela})
	}
	if(window.location.href.includes("Tags")){
		prikaziTags({tabela:tabela})
	}
	if(window.location.href.includes("Uloge")){
		prikaziUloge({tabela:tabela})
	}
	if(window.location.href.includes("Meni")){
		prikaziMeni({tabela:tabela,idRod:0})
		prikaziPodMeni({tabela:tabela,idRod:1})
	}
	
	})
}

}


//select svih kategorija
function prikaziKat(obj){
	// alert("uslo")
callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
	ispis=""
	// let znak=0
	for(d of data){
		ispis+=`<tr><td>${d.idKat}</td><td class="input-group">
		<input type="text"  data-tabela="kategorije" data-id=${d.idKat} data-kolonaup="naziv" data-kolonawhere="idKat" class="form-control updateTextAdmin" value="${d.naziv}"></td>`
		// if(d.idRod>=1){
		// 	znak=1
		// }
			ispis+=`<td><a href="#" class="obrisiAdmin" data-parametar="idKat"  data-tabela="kategorije" data-id="${d.idKat}">Delete</a></td></tr>`
	}
	// if(znak){
	// 	$('.odPodKat').html(ispis)
	// }
	// else{
		$('.od').html(ispis)//	}
		$('.obrisiAdmin').click(obrisiAdmin)
		$('.updateTextAdmin').blur(updateAdmin)


})

}


//brisanje sa block liste
function RemoveBlock(e){
	e.preventDefault()
	let email=this.dataset.email
callBackAjax("models/adminPanel/removeBlock.php", "POST", {email:email}, function(data){
	alert(data)
	location.reload()
})
}


//update radnih dana restorana

function updateDaysRestoran(){
callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
	alert(data)
	location.reload()
})

}

//select svih podkategorija
function prikaziPodKat(obj){
callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
callBackAjax("models/adminPanel/prikazi.php", "POST", {idRod:0, tabela:"kategorije"}, function(kategorije){
	ispis=""
	for(d of data){
		ispis+=`<tr><td>${d.idKat}</td><td class="input-group">
		<input type="text"  data-tabela="kategorije" data-id=${d.idKat} data-kolonaup="naziv" data-kolonawhere="idKat" class="form-control updateTextAdmin" value="${d.naziv}"></td>
		<td><select data-kolonaWhere="idKat" data-kolonaUp="idRod"  data-tabela="kategorije" data-id="${d.idKat}" class=" updateRoditelja form-control">`
for(k of  kategorije){
	if(k.idKat==d.idRod){
		ispis+=`<option value="${k.idKat}" selected>${k.naziv}</option>`
	}
	else{
		ispis+=`<option value="${k.idKat}">${k.naziv}</option>`
	}
}
ispis+=`</select></td>
<td><a href="#" class="obrisiAdmin" data-parametar="idKat"  data-tabela="kategorije" data-id="${d.idKat}">Delete</a></td></tr>`

	}
		$('.odPodKat').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
		$('.updateTextAdmin').blur(updateAdmin)
		$('.updateRoditelja').change(updateAdmin)
	})


})

}


//select svih kolicine
function prikaziKolicine(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		ispis=""
		for(d of data){
			ispis+=`<tr><td>${d.idKol}</td><td class="input-group">
			<input type="text" class="form-control updateTextAdmin"  data-tabela="kolicina" data-id=${d.idKol} data-kolonaup="kolicina" data-kolonawhere="idKol" value="${d.kolicina}"></td>
			<td><a href="#" data-tabela="kolicina" data-parametar="idKol"  class="obrisiAdmin" data-id="${d.idKol}">Delete</a></td></tr>`
		}
		$('.od').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
		$('.updateTextAdmin').blur(updateAdmin)


	})
	}
//dohvatanje svih uloga
// function uloge(){
// 	callBackAjax("models/adminPanel/prikazi.php", "POST", {tabela:"uloge"}, function(data){
// 		return "da"
// 	})
// }

function prikaziUloge(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		// console.log(data)
		ispis=""
		for(d of data){
			ispis+=`<tr><td>${d.idUloga}</td><td class="input-group">
			<input type="text" data-tabela="uloge" data-id=${d.idUloga} data-kolonaup="naziv" data-kolonawhere="idUloga" class="form-control updateTextAdmin" value="${d.naziv}"></td>
			<td><a href="#" data-tabela="uloge" data-parametar="idUloga" class="obrisiAdmin" data-id="${d.idUloga}">Delete</a></td></tr>`
		}
		$('.prikaziUloge').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
		$('.updateTextAdmin').blur(updateAdmin)


	})
}

//select svih korisnika
function prikaziUsers(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		ispis=""
		callBackAjax("models/adminPanel/prikazi.php", "POST", {tabela:"uloge"}, function(uloge){
		for(d of data){
			ispis+=`<tr><td>${d.idKor}</td>
			<td>${d.ime}</td>
			<td>${d.prezime}</td>
			<td>${d.email}</td>
			<td>${d.address}</td>

			<td><img class="img" src="assets/images/users/${d.pic}"/></td>
			
			<td colspan="2"><select data-kolonaWhere="idKor" data-kolonaUp="IdUloga"  data-tabela="korisnik" data-id="${d.idKor}" class=" updateUloge form-control">`

			for(u of uloge){
				if(u.idUloga==d.IdUloga){
					ispis+=`<option value="${u.idUloga}" selected>${u.naziv}</option>`
				}
				else{ispis+=`<option value="${u.idUloga}">${u.naziv}</option>`}
			}

			ispis+=`</select></td><td><a href="#" data-tabela="korisnik" data-parametar="idKor" class="obrisiAdmin" data-id="${d.idKor}">Delete</a></td></tr>`
		}
		$('.users').html(ispis)
		$('.updateUloge').change(updateAdmin)
		$('.obrisiAdmin').click(obrisiAdmin)
	}) })
}	


//select svih tagova
function prikaziTags(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		ispis=""
		for(d of data){
			ispis+=`<tr><td>${d.idPodKat}</td><td class="input-group">
			<input type="text" data-tabela="podkategorije" data-id=${d.idPodKat} data-kolonaup="naziv" data-kolonawhere="idPodKat" class="form-control updateTextAdmin" value="${d.naziv}"></td>
			<td><a href="#" data-tabela="podkategorije" data-parametar="idPodKat" class="obrisiAdmin" data-id="${d.idPodKat}">Delete</a></td></tr>`
		}
		$('.od').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
		$('.updateTextAdmin').blur(updateAdmin)
	})
	}

	//prikazi poruke na stranici dashboard
function prikaziPoruke(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		ispis=""
		for(d of data){
			ispis+=`<tr><td>${d.idMess}</td>
			<td>${d.email}</td>
			<td>${d.subject}</td>
			<td>${d.message}</td>


			<td><a href="#" data-tabela="poruke" data-parametar="idMess" class="obrisiAdmin" data-id="${d.idMess}">Delete</a></td></tr>`
		}
		$('.poruke').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
	})
}


//prikazi meni
function prikaziMeni(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		ispis=""
		for(d of data){
			ispis+=`<tr>
			<td>${d.idMeni}</td>
			<td>${d.naziv}</td>
			<td><a href="#" data-tabela="meni" data-parametar="idMeni" class="obrisiAdmin" data-id="${d.idMeni}">Delete</a></td></tr>`
		}
		$('.glMeni').html(ispis)
		$('.obrisiAdmin').click(obrisiAdmin)
	})
}

function prikaziPodMeni(obj){
	callBackAjax("models/adminPanel/prikazi.php", "POST", obj, function(data){
		callBackAjax("models/adminPanel/prikazi.php", "POST", {idRod:0, tabela:"meni"}, function(meni){
			ispis=""
			for(d of data){
				ispis+=`<tr><td>${d.idMeni}</td><td class="input-group">
				<p>${d.naziv}</p></td>
				<td><select data-kolonaWhere="idMeni" data-kolonaUp="idRod"  data-tabela="meni" data-id="${d.idMeni}" class=" updateRoditelja form-control">`
		for(m of  meni){
			if(m.idMeni==d.idRod){
				ispis+=`<option value="${m.idMeni}" selected>${m.naziv}</option>`
			}
			else{
				ispis+=`<option value="${m.idMeni}">${m.naziv}</option>`
			}
		}
		ispis+=`</select></td>
		<td><a href="#" class="obrisiAdmin" data-parametar="idMeni"  data-tabela="meni" data-id="${d.idMeni}">Delete</a></td></tr>`
		
			}
				$('.podMeni').html(ispis)
				$('.obrisiAdmin').click(obrisiAdmin)
				$('.updateTextAdmin').blur(updateAdmin)
				$('.updateRoditelja').change(updateAdmin)
			})
		})

		
		
}
//update statusa porudzbine
function updateStatus(e){
	e.preventDefault()
	let value=this.dataset.status
	let korpa=this.dataset.idkorpa
	// alert(korpa)
	callBackAjax("models/adminPanel/update.php", "POST", {tabela:"korpa",value:value,kolonaUpdate:"izvrseno",kolonaWhere:"idKorpa",idK:korpa}, function(data){
alert(data)
location.reload();
	})
	// $('.updateStatus').click(updateStatus)
}


//update uloge na strani za usere na admin panelu
function updateAdmin(){
	let value=this.value //vrednost za uapdate
	let tabela=this.dataset.tabela
	let idK=this.dataset.id
	let kolonaUpdate=this.dataset.kolonaup
	let kolonaWhere=this.dataset.kolonawhere
let reg=/^([A-z](\s)*)+$/;
let vrednost=true
let poruka=""
// alert(tabela)
if((tabela=="korisnik" || kolonaUpdate!="idRod") && value==0){
	vrednost=false
	poruka="Vrednost iz dropdown liste mora da se odabere"
}
else if((tabela!="korisnik" && kolonaUpdate!="idRod") && !reg.test(value)){
vrednost=false
poruka="Tekstualna polja moraju da sadrze samo slova"
}
	if(vrednost){
		callBackAjax("models/adminPanel/update.php", "POST", {tabela:tabela,value:value,kolonaUpdate:kolonaUpdate,kolonaWhere:kolonaWhere,idK:idK}, function(data){
			alert(data)
			if(window.location.href.includes("Kategorije")){
				prikaziPodKat({idRod:1,tabela:"kategorije"})
			}
		})
	}
	else{
		alert(poruka)
	}

}

	//brisanje stavki iz admina za tagove kategorije kolicine
function obrisiAdmin(e){
	e.preventDefault()
	let tabela=this.dataset.tabela
	let parametar=this.dataset.id
	let id=this.dataset.parametar
	callBackAjax("models/adminPanel/brisanjeAdmin.php", "POST", {tabela:tabela,id:id,parametar:parametar}, function(data){
// alert(data);
if(window.location.href.includes("Kategorije")){
	prikaziKat({idRod:0,tabela:tabela})
	prikaziPodKat({idRod:1,tabela:tabela})
}
if(window.location.href.includes("Kolicine")){
	prikaziKolicine({tabela:tabela})
}
if(window.location.href.includes("Tags")){
	prikaziTags({tabela:tabela})
}
if(window.location.href.includes("Korisnici")){
	prikaziUsers({tabela:tabela})
}
if(window.location.href.includes("Uloge")){
	prikaziUloge({tabela:tabela})
}
if(window.location.href.includes("Meni")){
	prikaziMeni({tabela:tabela,idRod:0})
	prikaziPodMeni({tabela:tabela,idRod:1})
}
if(window.location.href.includes("Dashboard") || !window.location.href.includes("admin=")){
location.reload();
}
	})


}

//prikaz korpe
function prikazKorpe(){
	let korpa=getItemFromLocalStorage("korpa")
	// console.log(korpa[0].idK)
	console.log(korpa)
	let total=0
	let ispis=``
	for(i=1;i<korpa.length;i++){
		// console.log(korpa[i])
		ispis+=`<tr class="text-center">
		<td id="${korpa[i].idKJ}" class="product-remove ukloni"><a href="#"><span>X</span></a></td>
		<td class="image-prod"><div class="img" style="background-image:url(assets/images/food_small/small_${korpa[i].slika});"></div></td>
		<td class="product-name">
		<h3>${korpa[i].naziv}</h3>
		<p>Far far away, behind the word mountains, far from the countries</p>
		</td>
		<td class="price">${korpa[i].cena}</td>
		<td class="quantity">
		<div class="input-group mb-3">
		<input type="text" name="${korpa[i].idKJ}" class="quantity form-control input-number" value="${korpa[i].kolicina}" min="1" max="100">
		</div>
		</td>
		<td class="total">${korpa[i].cena*korpa[i].kolicina}</td>
		</tr>`
		total+=korpa[i].cena*korpa[i].kolicina
	}
	$('.korpaPrikaz').html(ispis);
	$('#korpaTotal').text(total)
	$('.ukloni').click(obrisiJeloKorpa)
	$('.quantity').blur(updateKolicineKorpa)
	
}

//prikaz tabele sa porudzbinama na stranici dashboard
// function prikazKorpeDash(){
// let ispis=""
// callBackAjax("models/adminPanel/prikazi.php", "POST", {tabela:"korpa"}, function(data){
// 	callBackAjax("models/adminPanel/prikazi.php", "POST", {tabela:"korisnik"}, function(korisnik){
// 		let iznos=0;
// for(d of data){
// 		for(k of korisnik){
// if(k.idKor==d.idK){
// 	ispis+=`       <tr>
//                       <th scope="row">${d.idKorpa}</th>
//                       <td><img alt="${k.ime}" src="assets/images/users/${k.pic}"/></td>
//                       <td>${k.ime} ${k.prezime}</td>
//                       <td>New Town</td>`
// 				if(d.izvrseno==0){
// 					ispis+=`<td><span class="badge badge-primary">Pending</span>`

// 				}
// 				else{
// 					ispis+=`<td><span class="badge badge-success">Done</span>`
// 				}
// 				ispis+=`  </td>
// 				<td>${d.datum}</td>
// 				<td>$10</td>
// 			  </tr>`
                    
// 	break;
// }

// }}
// $('.prikazKorpe').html(ispis)
// })


// })



// }


//promenaKolicine
function updateKolicineKorpa(){
	let idKJ=this.name
	let vrednost=this.value
	let korpa=getItemFromLocalStorage("korpa")
korpa.map(function(x){if(x.idKJ==idKJ){x.kolicina=vrednost}})
setItemToLocalStorage("korpa",korpa)
alert("Quantity updated")
prikazKorpe();
}
function brojKorpa(){
	$brojElemenataUKorpi=getItemFromLocalStorage("korpa");
	if($brojElemenataUKorpi){
		$brojElemenataUKorpi=$brojElemenataUKorpi.length;
		$('#korpaPlus').text($brojElemenataUKorpi-1)
	}
	
}


//brisanje jela
function obrisiJeloKorpa(e){
e.preventDefault();
let idKJ=this.id;
let korpa=getItemFromLocalStorage("korpa")
let niz=[]
korpa.map(function(x){if(x.idKJ!=idKJ){niz.push(x)}})
// console.log(niz)
setItemToLocalStorage("korpa",niz)
prikazKorpe();
brojKorpa();
}

//plus i minus za quantity na strani product
function smanji(){
	let broj=$('#quantity').val()
	broj=parseInt(broj)
	console.log(broj)
	if(broj>1){
		$('#quantity').val(broj-1)
	}
	else{alert("Quantity must be greater than 0 ")}
}
function povecaj(){
	let broj=$('#quantity').val()
	broj=parseInt(broj)
	$('#quantity').val(broj+1)


}

// function prikazKatMeniKolTags($tabela){
// callBackAjax("models/adminPanel/prikazKatMeniKolTags.php", "POST", {tabela:tabela}, function(data){
// })
// }

	//update informacija o restoranu na strani admin panel
function updateRestoranInfo(){
	let Story=/^([A-z][\.\-\,]*(\s)*)+$/;
	let text=""
	let About=/^([A-z][\.\-\,]*(\s)*)+$/;
	let Address=/^[\w\s.-]+[\dA-z]+,\s*[\w\s.-]+$/
	let Name=/^[A-z\&]+$/
	let Phone=/^[\d]{9,11}$/
	let Email=/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/
	let Website=/^(http\:\/\/||https\:\/\/)[A-z\d(\.)*]+(\/)*[\.a-z]+$/
	let regTime=/^[0-9]{2}:[0-9]{2}$/
	let value=this.value;
	let key=this.dataset.key;
	let greska=true;
	if(key=="Name"){
		greska=Name.test(value);
		text="nije u dobrom formatu. Mora da sadrzi samo slova. Ukoliko ima vise reci umesto razmaka je &"}
if(key=="Website"){
			greska=Website.test(value);
			text="nije u dobrom formatu. Mora da sadrzi samo url adresu bez parametara. npr yoursite.com"}
if(key=="Phone"){
		greska=Phone.test(value);
		text="nije u dobrom formatu. Mora da sadrzi samo cifre, duzine od 9 do 11"}
if(key=="Story"){
	greska=Story.test(value);
	text="nije u dobrom formatu. Mora da sadrzi samo slova ili simbole . , -"}
if(key=="About"){
	greska=About.test(value);
	text="nije u dobrom formatu. Mora da sadrzi samo slova ili simbole . , -"
}
if(key=="Email"){
	greska=Email.test(value);
	text="nije u dobrom formatu. Mora da sadrzi @"
}
if(key=="Address"){
	greska=Address.test(value);
	text="nije u dobrom formatu. Treba da izgleda: Naziv broj, mesto"
}
if(key=="OpenDays"){
	let ch=$('.daniChb:checked')
	let dani=[]
	ch.each(function(){dani.push(this.value)})
	value=dani.join()
}
if(key=="OpenHours"){

let from=$('.from').val()
let to=$('.to').val()
greska=regTime.test(from);
text="From nije u dobrom formatu. Treba da izgleda npr. 22:00"
if(greska){
	greska=regTime.test(to);
	text="To nije u dobrom formatu. Treba da izgleda npr. 22:00"
}
value=from+"-"+to;

}
if(greska){
	callBackAjax("models/adminPanel/updateRestoranInfo.php", "POST", {value:value,key:key}, function(data){
		alert(data);
		if(key=="OpenDays" || key=="OpenHours"){
			location.reload()
		}
	})
}
else{
	alert(key+" "+text)
}


}


	//klik za brisanje jela na admin panelu
function adminPanelDeleteJela(e){
e.preventDefault();
let id=this.dataset.id;
callBackAjax("models/adminPanel/obrisiJelo.php", "POST", {id:id}, function(data){
alert(data);
window.location.reload();
})}

//skladistenje u Local Storage
function setItemToLocalStorage(name, value){
	localStorage.setItem(name, JSON.stringify(value));
}
//vracanje iz Local Storage
function getItemFromLocalStorage(name){
	return JSON.parse(localStorage.getItem(name));
}



	//prikaz Cene Za Kolicinu u odnosu na to sta je odabrano od kolicine u dropdown listi
function prikaziCenu(){
	let idKJ=this.value
	let idJelo=this.dataset.id
	let obj={idKJ:idKJ,idJelo:idJelo}
	callBackAjax("models/prikaziCenuDropdown.php", "POST", obj, function(data){
		console.log(data)
		$('#iznos').html(`<p class="price" id="iznos"><span>${data.iznos} din</span></p>`)
		$('.cenaKorpa').val(data.iznos)
	})
}


	//filtriranje
function filtriraj(parametar){
	callBackAjax("models/filtrirajAll.php", "POST", parametar, function(data){
		let ispis=""
// 		if(data.data.len)
if(data.data.length==0){		
ispis="<h6>No products</h6>"
		}else{

		for(d of data.data){
			ispis+=`<div class="col-md-3">
			<div class="menu-entry">
			<a href="index.php?page=Product&id=${d.idJelo}" class="img" style="background-image: url(assets/images/food_small/small_${d.src});"></a>
			<div class="text text-center pt-4">
			<h3><a href="index.php?page=Product&id=${d.idJelo}">${d.naziv}</a></h3>
			<p>${d.opis}</p>
			<p class="price"><span>${d.iznos} din</span></p>
			<input type="hidden" value="1" class="quantity"/>
			<p><a href="#" data-idKJ="${d.idKJ}" data-cena="${d.iznos}" data-slika="${d.src}" data-naziv="${d.naziv}" class="btn btn-primary btn-outline-primary korpa">Add to Cart</a></p>
			</div>
			</div>
			</div>`
		}}
		$('#jela').html(ispis);
		$('.korpa').click(dodavanjeUKorpu)

		//paginacija
		paginacija(data.paginacija)
	})}

	//dodavanje u korpu
function dodavanjeUKorpu(e){
	e.preventDefault();
let naziv=this.dataset.naziv
let slika=this.dataset.slika
let broj=$('#korpaPlus').text()
let idKJ="";
let cena="";
if(this.dataset.jedan){
idKJ=$('.idKJ').val();
cena=$('.cenaKorpa').val()
// alert(cena)
}
else{
cena=this.dataset.cena
	idKJ=this.dataset.idkj}
let idK=$('#idUlogovan').val()
let kolicina=$('.quantity').val()

kolicina=parseInt(kolicina);
broj=parseInt(broj);
broj=broj+1;
$('#korpaPlus').text(broj)
let korpa=getItemFromLocalStorage("korpa");
if(korpa){
	let bool=true;
	korpa.map(function(x){if(x.idKJ==idKJ){x.kolicina=x.kolicina+kolicina; bool=false;}})
	if(bool){
		korpa.push({idKJ:idKJ,kolicina:kolicina,slika:slika,naziv:naziv,cena:cena})
	}
	setItemToLocalStorage("korpa",korpa)
}
else{
	let jelo = [];
		jelo[0]={idK:idK}				
		jelo[1] = {
			idKJ: idKJ,
			kolicina : kolicina,
			slika:slika,
			naziv:naziv,
			cena:cena
		}
	setItemToLocalStorage("korpa",jelo)
}
alert("Added to cart!")

}

//upisivanje u bazu potvrde kuopvine iz korpe
function krajKorpa(e){
e.preventDefault();
let korpa=getItemFromLocalStorage("korpa");
// console.log(korpa)
callBackAjax("models/korpaInsert.php", "POST",{korpa:korpa}, function(data){
	alert(data)
localStorage.removeItem("korpa")
location.reload();

})
}

		//paginacija
function paginacija(data){
	let broj=Math.ceil(data/8)
	let ispis=""
	for(i=1; i<=broj; i++){
			ispis+=`<li class="page-item"><a href="index.php?broj=`+i+`" id="`+i+`" class="page-link pag">`+i+`</a></li>`;

		}
		$("#pagination").html(ispis);
		$('.pag').click(function(e){
			e.preventDefault();
			setItemToLocalStorage("brojPag",this.id);
			var obj=objekat()
			filtriraj(obj);
		})
}
	
//funkcija za pravljenje objekta za slanje preko ajaxa za filtriranje,sortiranje,paginaciju
function objekat(){
	let obj={broj:getItemFromLocalStorage("brojPag"),parametar:getItemFromLocalStorage("kategorije")}
	let price=getItemFromLocalStorage("price")
if(price!=null){
	obj.cene=price
	}
let tags=getItemFromLocalStorage("tags")
	if(tags!=null){
		obj.tags=tags;
	}
let sort=getItemFromLocalStorage("sort")
	if(sort!=null){
	obj.sort=sort
	}
	return obj;
}

	//dodavanje polja za cenu u odnosu na kolicinu
function dodavanjePoljaCena(){
	let val=$('.insertJeloKolChb:checked')
	let ispis=""
	for(v of val){
		// console.log(v.value)
		ispis+=`
		<div class="input-group">
		<input type="text" class="form-control insertJeloCena" value="" placeholder="Price for ${v.id}">
		<div class="invalid-feedback d-block">
		<strong id="reginsertJeloCena" class="d-none text-danger"></strong>
		</div>
		</div>`
			}
	$('#addPoljeCena').html(ispis);

}
	//insert podkategorije
function insertPodKategorije(){
let podKat=$('#insertTagVrednost').val();
let regPodKat=/^[a-z]{3,}$/
let greske=provera(podKat,regPodKat,"You can only enter lowercase letters and a minimum of 3 characters.","reginsertTag")
if(greske){
	callBackAjax("models/adminPanel/insertPodKat.php", "POST", {objPodKat:podKat}, function(data){
		$('#insertTagVrednost').val("");
		let ispis=""
for(d of data){
ispis+=`<label class="custom-control col-3 custom-checkbox custom-control-inline">
<input type="checkbox" value="${d.idPodKat}" class="custom-control-input insertJeloTagsChb" name="checkbox"
	 data-parsley-errors-container="#error-checkbox">
<span class="custom-control-label">${d.naziv}</span>
</label>`
}
// console.log(ispis)
$('#divPodKat').html(ispis)

		
})
}
}

//update jela
	//insert jela u bazu
	function updateJela(e){
		// alert("sdf")
		e.preventDefault();
	let name=$('#updateJeloName').val();
	// console.log(name)
	// let mainKat=$('#updateJeloKat1').val()
	let podKat=$('#insertJeloKat2').val()
	let tags=$('.updateJeloTagsChb:checked')
	let tagsArr=[]
	tags.each(function(){tagsArr.push(this.value)})
	let cena=$('.updatetJeloCena');
	let desc=$('#updateJeloDesc').val();
	// alert(desc)
	let pic=$('#updateJeloPic')[0].files[0];
	let kolicina=$('.updateJeloKolChb:checked')
	let kolArr=[]
	let ceneArr=[]
	kolicina.each(function(){kolArr.push(this.value)})
	let regName=/^([A-z](\s)*)+$/;
	let regDesc=/^([A-z][\.\-\,]*(\s)*)+$/
	let regCena=/^[0-9]{1,}$/
	let id=$('#id').val()
	let greske=[];
	console.log(kolicina)

	if(tagsArr.length<2){
		greske.push(false)
		$('#regupdateJeloTag').removeClass('d-none');
		$('#regupdateJeloTag').html("You must choose at least 2 tags.");
	}
	else{
		$('#regupdateJeloTag').addClass('d-none');
	}
	// if(pic==undefined){greske.push(false)
		// $('#regupdateJeloPic').removeClass('d-none');
		// $('#reginsertJeloPic').html("You must add a picture.");
	// }
	// 	else{
	// 		$('#reginsertJeloPic').addClass('d-none');
	// 	}
	greske.push(provera(name,regName,"The name of product can only be written in letters.","regupdateJeloName"))
	// console.log(cena)
	for(c of cena){
		// console.log(c.value)
		if(provera(c.value,regCena,"Price  of product can only be written in numbers.","regupdateJeloCena")){
			ceneArr.push(c.value);
		}
		else{greske.push(false)}
	}
	// console.log(ceneArr)
	greske.push(provera(desc,regDesc,"The description of product can only be written in letters and contain - or . or , ","regupdateJeloDesc"))
	if(kolicina.length==0){
		greske.push(false)
			$('#regupdateJeloKol').removeClass('d-none');
			$('#regupdateJeloKol').html("You must choose at least one quantity");
	}
	else{
		$('#regupdateJeloKol').addClass('d-none');
	}
	// if(mainKat==0){
	// 	greske.push(false)
	// 		$('#reginsertJeloKat1').removeClass('d-none');
	// 		$('#reginsertJeloKat1').html("You must choose main category");
	// }
	// else{
	// 	$('#reginsertJeloKat1').addClass('d-none');
	// }
	// console.log(ceneArr)
	if(!greske.includes(false)){
		obj=new FormData();
			obj.append('objName',name);
			obj.append('objpodKat',podKat);
			obj.append('objTags',tagsArr);
			obj.append('objCena',ceneArr);
			obj.append('objDesc',desc);
			obj.append('objPic',pic);
			obj.append('objKolicina',kolArr);
			obj.append('id',id);

			// console.log(obj)
		callBackAjaxFile("models/adminPanel/updateJelo.php", "POST", obj, function(data){
			console.log(data)
	alert(data)
	window.location.href="index.php?page=Admin%20panel&admin=Spisak%20jela"
		})
	
	
	}
	
	}

	//insert jela u bazu
function insertJela(e){
	e.preventDefault();
let name=$('#insertJeloName').val();
let mainKat=$('#insertJeloKat1').val()
let podKat=$('#insertJeloKat2').val()
let tags=$('.insertJeloTagsChb:checked')
let tagsArr=[]
tags.each(function(){tagsArr.push(this.value)})
let cena=$('.insertJeloCena');
let desc=$('#insertJeloDesc').val();
// alert(desc)
let pic=$('#insertJeloPic')[0].files[0];
let kolicina=$('.insertJeloKolChb:checked')
let kolArr=[]
let ceneArr=[]
kolicina.each(function(){kolArr.push(this.value)})
let regName=/^([A-z](\s)*)+$/;
let regDesc=/^([A-z][\.\-\,]*(\s)*)+$/
let regCena=/^[0-9]{1,}$/
let greske=[];
if(tagsArr.length<2){
	greske.push(false)
	$('#reginsertJeloTag').removeClass('d-none');
	$('#reginsertJeloTag').html("You must choose at least 2 tags.");
}
else{
	$('#reginsertJeloTag').addClass('d-none');
}
if(pic==undefined){greske.push(false)
	$('#reginsertJeloPic').removeClass('d-none');
	$('#reginsertJeloPic').html("You must add a picture.");}
	else{
		$('#reginsertJeloPic').addClass('d-none');
	}
greske.push(provera(name,regName,"The name of product can only be written in letters.","reginsertJeloName"))
for(c of cena){
	if(provera(c.value,regCena,"Price  of product can only be written in numbers.","reginsertJeloCena")){
		ceneArr.push(c.value);
	}
	else{greske.push(false)}
}
// console.log(ceneArr)
greske.push(provera(desc,regDesc,"The description of product can only be written in letters and contain - or . or , ","reginsertJeloDesc"))
if(kolicina.length==0){
	greske.push(false)
		$('#reginsertJeloKol').removeClass('d-none');
		$('#reginsertJeloKol').html("You must choose at least one quantity");
}
else{
	$('#reginsertJeloKol').addClass('d-none');
}
if(mainKat==0){
	greske.push(false)
		$('#reginsertJeloKat1').removeClass('d-none');
		$('#reginsertJeloKat1').html("You must choose main category");
}
else{
	$('#reginsertJeloKat1').addClass('d-none');
}
// console.log(ceneArr)
if(!greske.includes(false)){
	obj=new FormData();
		obj.append('objName',name);
		obj.append('objpodKat',podKat);
		obj.append('objTags',tagsArr);
		obj.append('objCena',ceneArr);
		obj.append('objDesc',desc);
		obj.append('objPic',pic);
		obj.append('objKolicina',kolArr);
	callBackAjaxFile("models/adminPanel/insertJelo.php", "POST", obj, function(data){
alert(data)
window.location.href="index.php?page=Admin%20panel&admin=Spisak%20jela"
	})


}

}

	//odabir kategorije u insert proizvoda
function kategorijaRoditelj(){
let idKat=this.value
callBackAjax("models/adminPanel/selectIdRod.php", "POST", {objKat:idKat,tabela:"kategorije"}, function(data){

$('#insertJeloKat2').removeAttr('disabled')
let ispis=""
for(d of data){
ispis+=`<option value="${d.idKat}">${d.naziv}</option>`
}
$('#insertJeloKat2').html(ispis)

})}

	//kod za log out
function logout(e){
    // alert("dfs")
	e.preventDefault();
	callBackAjax("models/logout.php", "POST", {dugme:true}, function(data){
localStorage.removeItem("korpa")
			window.location.href="index.php"
	})
}
	//kod za login
function login(e){
	e.preventDefault();
	var email=$('#logEmail').val();
	var pass=$('#logPass').val();
	var regEmail=/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/
	var regPass=/^.{5,}$/
	let greske=[]
   greske.push(provera(email, regEmail,"something@something.something.","logRegEmail"))
   greske.push(provera(pass, regPass,"Must contain minimum 5 charachters.","logRegPass"))
   if(!greske.includes(false)){
	callBackAjax("models/loginServer.php", "POST", {objEmail:email,objPass:pass}, function(data){
		if(data=="ok"){
			window.location.href="index.php"
		}
	})

   }

}

//update profila kroisnika
	function updateProfile(e){
		e.preventDefault();
	 var ime=$('#upIme').val();
	 var prezime=$('#upPrezime').val();
	 var email=$('#upEmail').val();
	 var pass=$('#upPass').val();
	 var address=$('#upAdress').val();
	 var pic=$('#upPic')[0].files[0];
	 var uloga=$('#upUloga').val()
	 var regImePrezime=/^[A-Z][a-z]{2,}$/
	 var regEmail=/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/
	 var regPass=/^.{5,}$/
	 var regAddress=/^[\w\s.-]+[\dA-z]+,\s*[\w\s.-]+$/
	 let idK=$('#idK').val()
	 	 let stariEmail=$('#stariEmail').val()

	 let greske=[]
	greske.push(provera(ime, regImePrezime,"First letter must be capital.","upImeTekst"))
	greske.push(provera(prezime, regImePrezime,"First letter must be capital.","upPrezimeTekst"))
	greske.push(provera(email, regEmail,"something@something.something.","upEmailTekst"))
	greske.push(provera(address, regAddress,"Name number, place","upAddressTekst"))
	if(pass!=""){
		greske.push(provera(pass, regPass,"Must contain minimum 5 charachters.","upPassTekst"))

	}
		if(!greske.includes(false)){
			obj=new FormData();
			obj.append('objIme',ime);
			obj.append('objPrezime',prezime);
			obj.append('objEmail',email);
			obj.append('objPass',pass);
			obj.append('objPic',pic);
			obj.append('uloga',uloga);
			obj.append('address',address);
			obj.append('idK',idK);
						obj.append('stariEmail',stariEmail);


	
	// console.log(obj)
			callBackAjaxFile("models/adminPanel/updateProfile.php", "POST", obj, function(data){
				alert(data);
				window.location.reload();
			})
		}
	
	}


	//kod za registraciju
function registracija(e){
	e.preventDefault();
 var ime=$('#regIme').val();
 var prezime=$('#regPrezime').val();
 var email=$('#regEmail').val();
 var pass=$('#regPass').val();
 var address=$('#regAdress').val();
 var pic=$('#regPic')[0].files[0];
 var uloga=$('.ulogaAddUser').val()
 var regImePrezime=/^[A-Z][a-z]{2,}$/
 var regEmail=/^[\w\d\.\-]+@[a-z]{2,}(\.[a-z]{2,3})+$/
 var regPass=/^.{5,}$/
 var regAddress=/^[\w\s.-]+[\dA-z]+,\s*[\w\s.-]+$/
 let greske=[]
greske.push(provera(ime, regImePrezime,"First letter must be capital.","regImeTekst"))
greske.push(provera(prezime, regImePrezime,"First letter must be capital.","regPrezimeTekst"))
greske.push(provera(email, regEmail,"something@something.something.","regEmailTekst"))
greske.push(provera(address, regAddress,"Name number, place","regAddressTekst"))
greske.push(provera(pass, regPass,"Must contain minimum 5 charachters.","regPassTekst"))
if(uloga==0){alert("You must choose roll") 
greske.push(false)}
if(pic!=undefined){greske.push(true)}
else{greske.push(false)
	alert("You must choose a profile picture!")}
	if(!greske.includes(false)){
		obj=new FormData();
		obj.append('objIme',ime);
		obj.append('objPrezime',prezime);
		obj.append('objEmail',email);
		obj.append('objPass',pass);
		obj.append('objPic',pic);
		obj.append('uloga',uloga);
		obj.append('address',address);


		callBackAjaxFile("models/regServer.php", "POST", obj, function(data){
			alert(data);
			window.location.reload();
		})
	}

}

	//provera regularnih
function provera(vrednost,reg,tekst,id){
	if(!reg.test(vrednost)){
		$('#'+id).removeClass('d-none');
		$('#'+id).html(tekst);
		return false;
	}
	else{
		$('#'+id).addClass('d-none');
		$('#'+id).html("");
		return true;
	}

}

	//prikaz login ili signup
function div(e){
	e.preventDefault();
		if($('#l').is(":visible")){
			$('#l').hide()
			$('#r').show()
		}
		else{
			$('#r').hide()
			$('#l').show()
		}

}

	//blok za log in i registraciju i zatvaranje
function close(e){
	e.preventDefault();
	$('#log').toggle(function(){
		if($('#log').is(":visible")){
			$('#layer').css("opacity","20%");
		}
		else{
			$('#layer').css("opacity","100%");

		}})
	}


	//callback funkcija Ajax
function callBackAjax(url, method, data, success){
		$.ajax({url:url,
			method:method,
			data:data,
			dataType:"json",
			success:success,
			error:function(xhr){
				console.error(xhr.status)
				console.error(xhr.responseText);
				alert(xhr.responseText)
				if(xhr.status==404){
					window.location.href="404.php"
				}
				if(xhr.status==500){
					alert("its server error!")
				}}})
	
			}
	//callback funkcija ajax za fajlove
	function callBackAjaxFile(url, method, data, success){
		$.ajax({url:url,
			processData: false,
			contentType: false,
			method:method,
			data:data,
			dataType:"json",
			success:success,
			error:function(xhr,data){
				console.error(xhr.responseText);
				console.error(xhr.status)
				if(xhr.status==404){
					window.location.href="404.php"
				}
					alert(xhr.responseText)
				}})
	
			}
			   