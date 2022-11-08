<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Inclusion de Tailwind CSS en mode Développement ("Play CDN")
			(Pour un passage en production, il faudrait build notre code
			pour ne garder que les éléments CSS qu'on utilise réellement) -->
<script src="https://cdn.tailwindcss.com"></script>
<style type="text/tailwindcss">
	@layer components {
		.base-pill {
			@apply inline-block border rounded py-1 px-5 min-w-[100px] text-center;
		}
		.inactive-pill {
			@apply base-pill text-gray-600 bg-gray-100 hover:bg-gray-200 hover:border-gray-300;
		}
		.active-pill {
			@apply base-pill border-blue-500 bg-blue-500 text-white;
		}
		.input-number {
			@apply inline-block w-[80px] px-3 py-1.5 text-base
				font-normal text-gray-700 bg-white bg-clip-padding
				border border-solid border-gray-300 rounded
				transition ease-in-out m-0
				focus:text-gray-700 focus:bg-white
				focus:border-blue-600 focus:outline-none;
		}
		.input-checkbox {
			@apply h-4 w-4 border border-gray-300 rounded-sm bg-white
				checked:bg-blue-600 checked:border-blue-600
				focus:outline-none
				transition duration-200
				mt-1 align-top bg-no-repeat bg-center bg-contain
				float-left mr-2 cursor-pointer;
		}
		.btn {
			@apply font-bold py-2 px-4 rounded cursor-pointer;
		}
		.btn-blue {
			@apply bg-blue-500 text-white;
		}
		.btn-blue:hover {
			@apply bg-blue-700;
		}
	}
</style>