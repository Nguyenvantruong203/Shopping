<template>
  <div class="about">
    <Header></Header>
    <Blog></Blog>
    <Connect></Connect>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from '../components/client/Header.vue'
import Footer from '../components/client/Footer.vue'
import Blog from '../components/client/Blog.vue'
import Connect from '../components/client/Connection.vue'


export default {
  name: "about",
  components: {
    Blog,
    Connect,
    Header,
    Footer
  },
  data() {
    return {};
  }
};
</script>

<style></style>
