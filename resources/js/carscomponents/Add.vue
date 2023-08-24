<template>
    <div>
        <div class="add">
            <form @submit.prevent="submitForm">
            
                <div class="h1"><H1>Add Car Information</H1></div>
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
                    <button class="green" type="submit">Submit</button>
                    
                </div>
                
            
            </form>

        </div>
        
    </div>
</template>
<script>
export default {
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
            state:"",
        };

    },
    
    methods:{
        submitForm(){
            let {id, brand,model, datepur, prevowner, cpn, status, owner, state} = this;
            alert("Submmitting");
            axios
                .post("/submit-name",{id,brand,model, datepur, prevowner, cpn, status, owner, state})
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
                    this.state = "";
                    this.$emit('Submitted');
                });
        },

    },
}
</script>
<style>
    .h1{
        justify-content: center;
        display: flex;
        margin: auto;
        
    }
    .add{
        background-color: #DDE6ED;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 30px;
        padding: 20px;
        border-radius: 20px;


    }
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=date], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .green, .red{
        margin-top: 10px;
        border-radius: 5px;
        padding: 5px;
        height: 35px;
        width: 100px;
        border:none;
        
    }
    .green:hover{
        background-color: #1F6E8C;
    }
    .red:hover{
        background-color: #A76F6F;
    }
    .red{
        margin-right: 10px;
    }

    
</style>