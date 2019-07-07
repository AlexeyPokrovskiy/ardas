<template>
    <div>
        <div class="card">
            <div class="card-header">
                Products
                <form class="d-flex justify-content-between">
                    <div class="filter">
                        <a class="float-right" href="/product/create"><button class="btn btn-primary">Add</button></a>
                    </div>
                    <div class="filter">
                        <input type="text" class="form-control" v-model="name"  placeholder="Name">
                    </div>

                    <div class="filter">
                        <button type="submit" @click.prevent="fetch" class="btn btn-success d-flex"><i v-if="busy" class="fa fa-spin fa-spinner"></i><span class="filter-fetch-button">Filter</span></button>
                    </div>
                    <div class="filter">
                        <button type="submit" @click.prevent="reset" class="btn btn-danger">Reset</button>
                    </div>

                </form>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class=" col-12">
                        <table class="table">
                            <tbody v-if="products.length">

                            <tr v-for="product in products">
                                <td>{{product.id}}</td>
                                <td>{{product.name}}</td>
                                <td>{{product.cost}}</td>
                                <td>{{product.created_at}}</td>
                                <td>
                                    <form onsubmit="if(confirm('Удалить')){return true}else{return false}" v-bind:action="'/product/'+product.id" method="post">
                                        <input type="hidden" name="_token" :value="csrf">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a class="btn btn btn-secondary" v-bind:href="'/product/'+product.id">
                                            Edit
                                        </a>
                                        <button type="submit" class="btn btn-danger" >Delete</button>

                                    </form>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="4" class="text-center">Не было найдено никаких результатов</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                products: [],
                busy: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {
            reset() {
                this.name = null;
                this.fetch();
            },
            fetch() {
                this.busy = true;
                axios.get('/getproducts', {
                    params: {
                        name: this.name,
                    }
                })
                    .then(response => {
                        this.products = response.data;
                        this.busy = false;
                    })
            }
        },
        mounted() {
            this.fetch();
        }
    }
</script>