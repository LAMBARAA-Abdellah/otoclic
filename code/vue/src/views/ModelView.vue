<template>
    <HeaderComponent title="Calculez la Cote Argus de votre" :mark="this.mark" :subtitle="this.subtitle" />
    <PathComponent :stepOne="this.stepOne" />
    <SearchBar @keyword="getKeyword" />
    <div class="models">
        <div class="sous-model">
            <div class="choice" v-for="(model, index) in modelSearch" :key="index" v-on:click="giveStyle(index), get(model)">
                <div @click="next" class="model" :class="{ checkeddiv: selected == index }">
                    <h3 :class="{ checkedtitle: selected == index }" class="title">{{ model }} </h3>
                </div>

            </div>

        </div>
         <div class="erer" v-if="!this.modelSearch.length">
    
      <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_lb9ljjup.json" background="transparent"
        speed="1"  loop autoplay></lottie-player>
    
       <h2>No result for  <span>"{{ Search }}"</span></h2>
  
       


    </div>

    </div>
   
    <div class="precedent">
    <div class="sous-prec">
        <div class="retour" @click="retour">
            <img src="../assets/return.png" alt="">
            <div>Retour</div>

        </div>
    </div>

    </div>







</template>

<script>
import HeaderComponent from '../components/Marque/HeaderComponent.vue'
import PathComponent from '../components/Marque/PathComponent.vue'
import SearchBar from '../components/SearchBar.vue'
import router from '../router'
// import Model from '../components/ModelComponent/Model.vue'



export default {
    name: 'MarqueView',
    components: {
        HeaderComponent,
        PathComponent,
        SearchBar,
        // Model,



    },
    props: {
        msg: String
    },
    data() {
        return {
            models: [" Fiesta ", " Focus ", " C-MAX ", " Custom ", " Explorer ", " Ka ",],
            checked: false,
            selected: null,
            mark: null,
            subtitle: null,
            modelSearch: [],
            Search: '',
            stepOne: '',
        }
    },
    methods: {
        giveStyle(i) {
            this.selected = i;
        },
        next() {
            router.push('/infos');
        },
        retour() {
            this.$router.push('/');

        },
        get(value) {
            localStorage.setItem('model', value);
            console.log(localStorage.getItem('model'));
        },
        getKeyword(value) {
            this.Search = value;
            this.modelSearch = this.models.filter(model => {
                return model.toLowerCase().includes(this.Search.toLowerCase());
            }
            );

            console.log(this.modelSearch);
        },

    },
    mounted() {
        this.mark = localStorage.getItem('marque');
        this.subtitle = "Otoclic vous propose de calculer la Cote Argus de votre" + this.mark + "en s??lectionnant votre mod??le parmi la liste ci-dessous";
        this.modelSearch = this.models

        let path = localStorage.getItem("marque");
        if(path != undefined){
            this.stepOne = path;
        }
    }
}
</script>
<style scoped >
.erer{
  margin-top: -120px;
      display: flex;
    flex-direction: column;
    align-items: center;
}
.erer lottie-player{
  width: 500px;
  height: 500px;
}
.erer h2{
  margin-top: -100px;
}
h2 span{
 color: #E5004E;
 font-weight: bold;
 font-size: larger;
}
.models {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px;
}

.model {
    width: 92%;
    height: 70px;
    background-color: #EEEEEE;
    border-radius: 10px;
    border: solid 2px #eeeeee;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-bottom: 15px;

}

.title {
    font-size: 25px;
    font-weight: 500;
    color: #717171;
    text-align: center;
}


.model:hover {
    transition: 1s;
    border: solid 2px #E5004E;
}


.checkeddiv {
    background-color: #E5004E;
    transition: 1s;
    border: solid 2px #E5004E;
}

.checkedtitle {
    color: white;
}

.btn:focus {
    outline: none;
}

.btn:active {
    transform: scale(0.98);
}

ul {
    list-style: none;
    border-top: solid 1px #A7A7A7;
    border-bottom: solid 1px #A7A7A7;
    width: 40%;
    font-size: 10px;
    padding: 2% 0;
    color: #717171;
}

.choice {
    width: 33%;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    flex-direction: column;

}


.precedent {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
.sous-prec {
    width: 80%;
}

.retour {
   margin-top: 50px;
    display: flex;
    cursor: pointer;
    width: 6%;
}

.retour img {
    border: solid 3px #E5004E;
    padding: 8px;
}

.retour div {
    border: solid 3px #E5004E;
    border-left: 0;
    padding: 8px;
    font-size: 20px;
    font-weight: bold;
    color: #E5004E;
}

.retour div {
    display: none;
}

.retour:hover div {
    display: block;
    transition: 3s;
}

.retour:hover img {
    transform: rotate(360deg);
    transition: 1s;
    border-right: 0ch;
}

.models {
    display: flex;
    justify-content: space-evenly;
}

.sous-model {
    margin-top: 40px;
    display: flex;
    flex-wrap: wrap;
    justify-items: center;
    justify-content: space-around;
    width: 80%;

}

@media(max-width: 768px) {
    ul {
        width: 80%;
    }
}

@media(max-width: 480px) {
    ul {
        width: 100%;
    }

    .search {
        width: 80%;
    }

    .model {
        width: 100%;

    }

    .choice {
        width: 100%;
    }

    .sous-model {
        margin-top: 6%;
        width: 80%;

    }
    
  .erer lottie-player{
    width: 300px;
    height: 300px;
  }
  .erer{
    margin-top: -50px;
  
}
.erer h2{
  margin-top: -20px;
}
}
</style>
