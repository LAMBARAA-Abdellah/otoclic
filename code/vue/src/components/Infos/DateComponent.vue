

<template>
<div class="date-circulation" >
    <div class="header">
    <h3>Mois de mise en circulation*</h3></div>
    <div class="choice">
        <div class="card"   v-for="(Month,index) in Months" :key="index" @click="showDetailModal(Month)" :class="{ checkeddiv: selected == Month }"  >
            <p>{{Month}}</p>
        </div>    
    </div>
    <div class="info">
        <p>*Pour trouver la date de mise en circulation (mois et année) de votre voiture, référez-vous à votre carte grise. Cette information se trouve dans le champ B</p>
    </div>
</div>
</template>

<script >

import LittleCard from './LittleCard.vue'

export default {
    name: 'YearsPopup',
    components: {
              LittleCard    
    },
  
     data() {
        return {
             monthSelected: {},
           Months : ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
           selected : "",
           show: true,
        }
    },
    methods: {
    showDetailModal(Month){
      console.log(Month);
      this.monthSelected = Month;
      this.$emit('clicked-show-detail', Month);
      this.checked(Month);
    },
    changeShow(){
            let visibility = this.show;
            console.log(visibility);
            this.$emit('showpopup', visibility);
    },
    checked(mounth){
    this.selected = mounth;
    this.changeShow();
  },
  },
  

}
</script>
<style  scoped>
.date-circulation{
    margin-top:5%;
}
.choice{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-top: -2%;
}
.info p{
    font-size: 11px;
    color: #848484;
    margin-top: 3%;
}
.card {
    border: solid 2px #eeeeee;
    border-radius: 10px;
    width: 30%;
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
    border: solid 2px #E5004F;
    transition: 1s;
}
.checkeddiv{
    background: #e5004e;
    color:white;
    border: solid 2px #E5004F;
    transition: 1s;
}
@media(max-width: 768px) {
  
}

@media(max-width: 480px) {
   .card {
    width: 48%;
}
}
</style>