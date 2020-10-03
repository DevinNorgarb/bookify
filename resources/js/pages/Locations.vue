<template>
  <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="hidden w-full text-gray-600 md:flex md:items-center">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z" fill="currentColor" />
            </svg>
            <span class="mx-1 text-sm">NY</span>
            <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
              Bookify
            </div>
          </div>
          <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
              <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
              <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/bookings">Bookings</a>
              <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/settings">Profile</a>
            </div>
          </nav>
        </div>
      </div>
    </header>

    <section class="text-gray-700 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col  w-full mb-20">
          <!-- <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
            Choose Location
          </h1> -->

          <p class=" mx-auto leading-relaxed text-base">
            Choose your desired Cinema
          </p>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base" />
        </div>
        <div class="flex flex-wrap -m-4 text-center">
          <div class="p-4 md:w-1/2 sm:w-1/2 w-full" @click="setLocation('cpt')">
            <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
              <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                <path d="M3 18v-6a9 9 0 0118 0v6" />
                <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z" />
              </svg> -->
              <h2 class="title-font font-medium text-3xl text-gray-900">
                Cape Town
              </h2>
              <p class="leading-relaxed">
                <!-- Files -->
              </p>
            </div>
          </div>
          <div class="p-4 md:w-1/2 sm:w-1/2 w-full" @click="setLocation('jhb')">
            <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
              <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              </svg> -->
              <h2 class="title-font font-medium text-3xl text-gray-900">
                Joburg
              </h2>
              <p class="leading-relaxed">
                <!-- Places -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-gray-200">
      <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
        <p class="py-2 text-gray-500 sm:py-0">
          All rights reserved
        </p>
      </div>
    </footer>
  </div>

  <!-- <card :title="$t('home')">
    {{ $t('you_are_logged_in') }}
  </card> -->
</template>

<script>
import axios from 'axios'
export default {
  // middleware: 'auth',

  data () {
    return {
      cartOpen: false,
      isOpen: false,
      shows: []
    }
  },
  mounted () {
    this.getShows()
  },
  metaInfo () {
    return { title: this.$t('home') }
  },
  methods: {
    setLocation (loc) {
      localStorage.setItem('location', loc)
      this.$router.push('/bookings')
    },
    getShows () {
      axios.get('/api/shows').then(response => {
        console.log(response.data)
        this.shows = response.data
      })
    }
  }
}
</script>
