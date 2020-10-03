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
      <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
            Book now
            <br class="hidden lg:inline-block">
          </h1>
          <p class="mb-8 leading-relaxed" />
          <div class="flex justify-center">
            <button class=" inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg" @click="makeBooking()">
              Make Booking
            </button>
          </div>
          <div class="custom-number-input h-10 w-32">
            <label for="custom-input-number" class="w-full text-gray-700 text-sm font-semibold">Amouunt of seats
            </label>
            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
              <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none" @click="count--">
                <span class="m-auto text-2xl font-thin">−</span>
              </button>
              <input v-model="count" type="number" class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>
              <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer" @click="count++">
                <span class="m-auto text-2xl font-thin">+</span>
              </button>
            </div>
          </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
          <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
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
      shows: [],
      count: 0
    }
  },
  mounted () {
    this.getShows()
  },
  metaInfo () {
    return { title: this.$t('home') }
  },
  methods: {

    makeBooking () {
      axios.post('/api/book', {
        seats: this.count,
        location: localStorage.getItem('location')
      })
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
