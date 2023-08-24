<template lang="">
    <div>
        <div class="add">
            <form @submit.prevent="submitForm">
                <div class="h1">
                    <H1>Edit Car Information</H1>
                </div>
                
                <div>
                    <label for="brand">Brand</label>
                    <input type="text" v-model="brand" required>
                </div>
                <div>
                    <label for="model">Model</label>
                    <input type="text" v-model="model" required>
                </div>
                <div>
                    <label for="datepur">Date Purchased</label>
                    <input type="date" v-model="datepur" required>
                </div>
                <div>
                    <label for="prevowner">Previous Owner</label>
                    <input type="text" v-model="prevowner" required>
                </div>
                <div>
                    <label for="cpn">Contact No.</label>
                    <input type="text" v-model="cpn" required>
                </div>
                <div>
                    <label for="status">Status</label>
                    <input type="text" v-model="status" required>
                </div>
                <div>
                    <label for="owner">Owner</label>
                    <input type="text" v-model="owner" required>
                </div>
                <div>
                    <button  class="green" type="submit">Submit</button>
                    <button  class="red" @click.prevent="$emit('cancelEdit')">Cancel</button>
                    
                </div>
                
            
            </form>

        </div>
    </div>
    
</template>
<script>
export default {
    props:["item"],
    data(){
        return{
            id:0,
            brand:"",
            model:"",
            datepur:"",
            prevowner:"",
            cpn:"",
            status:"",
            owner:"",
            state:""
        };

    },
    mounted(){
        this.id = this.item.id;
        this.brand = this.item.brand;
        this.model = this.item.model;
        this.datepur = this.item.datepur;
        this.prevowner = this.item.prevowner;
        this.cpn = this.item.cpn;
        this.status = this.item.status;
        this.owner = this.item.owner;
        this.state = this.item.state;
    },
    
    methods:{
        submitForm(){
            let {id, brand,model, datepur, prevowner, cpn, status, owner, state} = this;
            alert("Submmitting");
            axios
                .post("/submit-name",{id,brand,model, datepur, prevowner, cpn, status, owner, state })
                .then(({data})=> {
                    alert("Successful");
                    this.id = 0;
                    this.brand = "";
                    this.model = "";
                    this.datepur = "";
                    this.prevowner = "";
                    this.cpn = "";
                    this.status = "";
                    this.owner = "";
                    this.state = ""
                    this.$emit('Submitted');


                });
        },

    },
    
}
</script>
<style lang="">

    
</style>