<script >
export default{

data() {
        return {
           filelist: [],
           isLoading: false,
           count : 0
        }
    },
    methods: {
      
      dragFile(e) {
        if (e.dataTransfer.files.length > 5) {
        alert(`Only 5 files are allowed to upload.`);
        }else{
        event.preventDefault();
        this.$refs.file.files = event.dataTransfer.files;
        this.filelist = [...this.$refs.file.files];
        }
      },
      onChange() {
        if(this.$refs.file.files.length == 0){
            return;
        }
        else if (this.count > 4 || this.$refs.file.files.length > 5) {
        alert(`Only 5 files are allowed to upload.`);
        }
        else if (this.filelist.length > 0){
            console.log(this.filelist.length);
            console.log(this.$refs.file.files.length);
            this.filelist = this.filelist.concat([...this.$refs.file.files]);
            this.count += this.$refs.file.files.length;
            console.log(this.count);
        }
        else{
            this.filelist = [...this.$refs.file.files];
            console.log(this.filelist.length);
            this.count += this.$refs.file.files.length;
            console.log(this.count);
        }
    },

    remove(i) {
      this.filelist.splice(i, 1);
    },

    dragover(event) {
      event.preventDefault();
    },

    },

}


</script>

<template>

<div class="upload">
    <div class="input-upload">
        <div class="title">
        <h3>Téléchargez des images de véhicules</h3>
        </div>
        <a  @dragover="dragover" @dragleave="dragleave" >
        <div class="input" @click="$refs.file.click()" @drop="dragFile">
            <p>Faites Glisser ou <a>Téléchargez</a> des images de véhicules  </p>  
            <input type="file" multiple name="fields[assetsFieldHandle][]" id="assetsFieldHandle" class="w-px h-px opacity-0 overflow-hidden absolute" @change="onChange" ref="file" accept=".pdf,.jpg,.jpeg,.png" hidden/>
        </div>
        </a>
    </div>
        
    <div class="pictures-uploaded">
        <div class="picture-uploaded" v-for="file in filelist">
            <img class="picture" :src="'../../src/assets/'+file.name">
            <a @click="remove(filelist.indexOf(file))"><img class="delete" src="../../assets/delete.png"></a>
        </div>
</div>

    </div>

</template>
<style  scoped>
.input{
    background: #F4F4F4;
    padding: 5% 4%;
    background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='10' ry='10' stroke='red' stroke-width='4' stroke-dasharray='10%2c 15%2c 23%2c 11' stroke-dashoffset='36' stroke-linecap='square'/%3e%3c/svg%3e");
    border-radius: 10px;
    text-align: center;
    cursor:pointer;
}
.input:hover{
    background:#e5e5e5;
    padding: 5% 4%;
    background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='10' ry='10' stroke='red' stroke-width='4' stroke-dasharray='10%2c 15%2c 23%2c 11' stroke-dashoffset='36' stroke-linecap='square'/%3e%3c/svg%3e");
    border-radius: 10px;
}

.delete{
    width: 40%;
    cursor: pointer;
}
.input a{
    color:#E5004E;
    font-weight: bold;
    cursor:pointer;
}
/* input{
    display: none;
} */
[v-cloak] {
  display: none;
}
.pictures-uploaded{
    display:flex;
    margin-top: 1%;
}
.picture-uploaded{
    width: 6%;
    height: 60px;
    position: relative;
    border-radius: 10px;
    margin-right: 2%;
}
    
.picture{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.picture-uploaded a{
    background: rgb(0 0 0 / 60%);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
}
.upload{
    margin-top:5%;
}
@media (max-width: 480px) {
   .picture-uploaded{
    width: 50px;
    height: 50px;
   }
    
}
input.delay {
  margin-bottom: 15px;
}

.loading-overlay {
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(100, 100, 100, .5);
  position:absolute;
  width:100%;
  height:100%;
  top:0;
}

i.fa.fa-cog {
  font-size: 3em;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-active {
  opacity: 0;
}
.input-upload a{
    position:relative;
}


</style>