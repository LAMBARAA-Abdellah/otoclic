<script setup>


defineProps({
  title: String,
  mark: String
})


</script>

<template> 
<!-- <p>Hello This is MarquePage</p> -->

    <div class="header">
        <div class="title">
            <h2>{{ title }} {{mark}}</h2>
            <h4>Otoclic vous propose de calculer la Cote Argus de votre {{mark}} en sélectionnant votre modèle parmi la liste ci-dessous</h4>
        </div> 
    </div>

</template>

<style  scoped>
.header{
    display: flex;
    background: #E5004E;
    color: white;
    justify-content: center;
}
.title{
    text-align: center;
}
h2{
    font-weight: 600;
}

@media( max-width: 768px){
    h2{
    font-size: 20px;
    }
}
@media( max-width: 480px){
    h2{
    font-size: 15px;
    }
}

</style>
