

<template>

    <div class="boite-choice">
        <div class="header">
            <h3>Indiquez le type de boîte de vitesses</h3>
        </div>
        <div class="div-choice">
            <div class="choice" >
                <div  v-for="(carbur, index) in carburant " :key="index" v-on:click="giveStyle(index);nextstep(carbur);"  class="card"  :class="{ checkeddiv: selected == index }">
                    <p :class="{ checkedtitle: selected == index }">{{ carbur }}  </p>
                </div>
            </div>
        </div>
        <p class="message">*Pour trouver la cylindrée en cm3 de votre voiture, référez-vous à votre carte grise. Cette information se trouve dans le champ P1.</p>
    </div>

</template>
<script >
export default {
    name: 'carburant',
    props: {
    },
    data() {
        return {
            status: false,
            carburant: [
                '1,2 l (1 248 cm³)',
                '1,2 l (1 248 cm³)',
            ],
            selected :null,
        }
    },
     methods: {
        giveStyle(i){
        this.selected = i;
        console.log("imin");
        console.log(this.selected);
    },
    nextstep(value){
        this.$emit('step', 'step6'); 
        localStorage.setItem('cylinder',value);
    }
  },
  mounted(){
    if(this.carburant.length == 1){
        this.selected= 0;
        this.$emit('cylinder', 'cylinder');
    }
  }

}
</script>
<style  scoped>



.boite-choice {
    margin-top: 5%;
    width: 100%;
}

.choice {
      display: flex;
    justify-content: space-between;
    width: 100%;
    flex-wrap: wrap;
}

.div-choice {
    display: flex;
    justify-content: center;
}

.message {
    font-size: 11px;
    color: #848484;
    margin-top: 3%;
}

.card {
    border: solid 2px #eeeeee;
    border-radius: 10px;
    width: 48%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: #717171;
    margin-top: 2%;
    background: #EEE;
    cursor: pointer;
}

.card:hover {
    background: #e5004e;
    color: #ffffff;
    border: solid 2px #E5004F;
    transition: 1s;
}
.checkeddiv {
    background-color: #E5004E;
    transition: 1s;
    border: solid 2px #E5004E;
}
.checkedtitle {
    color: white;
}
@media(max-width: 768px) {
  
}

@media(max-width: 480px) {
   .card {
    width: 100%;
}
.boite-choice {
    width: 100%;
}
}
</style>