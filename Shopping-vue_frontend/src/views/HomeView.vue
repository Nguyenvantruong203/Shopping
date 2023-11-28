<script>
import Header from '../components/client/Header.vue'
import Footer from '../components/client/Footer.vue'
import Slide from '../components/client/Slide.vue'
import New_product from '../components/client/New_product.vue'
import Product from '../components/client/Product.vue'
import FeedBack from '../components/client/FeedBack.vue'
import Favorite from '../components/client/Favorite.vue'

export default {
  name: "about",
  components: {
    Slide,
    New_product,
    Product,
    FeedBack,
    Favorite,
    Header,
    Footer
  },
  data() {
    return {};
  }
};
</script>

<template>
  <Header></Header>
  <Slide></Slide>
  <New_product></New_product>

  <Product></Product>

  <FeedBack></FeedBack>
  <Favorite></Favorite>
<Footer></Footer>
</template>
