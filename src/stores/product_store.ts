import { defineStore } from "pinia";
import axios from 'axios'

interface group {
    id?: number
    name: string
}

interface promotion {
    id?: number
    title: string
    discount: number
    image: string
    buttonColor: 'green' | 'orange'
    color: string
}

interface category {
    id?: number
    name: string
    productCount: number
    items: number
    image: string
    color: string
    group: string
}

export interface product {
    id: number
    name: string
    price: number
    image: string
    categoryId: number
    countSold: number
    rating: number
    size: string
    discount: number
    group: string
    instock: number

}

export const useProductStore = defineStore('product', {
    state: () => ({
        groups: [] as (group | string)[],
        promotions: [] as promotion[],
        categories: [] as category[],
        products: [] as product[],
    }),
    
    getters: {
        
        getCategoriesByGroup: (state) => {
            return (groupName: string) => {
                return state.categories.filter(category => category.group === groupName);
            }
        },

        getProductsByGroup: (state) => {
            return (groupName: string) => {
                // return products that belong to the provided group name
                return state.products.filter(p => p.group === groupName);
            }
        },

        getProductsByCategory: (state) => {
            return (categoryId: number) => {
                return state.products.filter(product => product.categoryId === categoryId);
            }
        },

        //getPopularProducts: return the top-selling products (sorted by countSold desc)
        // This is more robust than a hard threshold so we still show items when counts are low.
        getPopularProducts: (state) => {
            return [...state.products]
                .sort((a, b) => (b.countSold ?? 0) - (a.countSold ?? 0))
                .slice(0, 10)
        },

        getGroupNames: (state) => {
            if (state.groups.length === 0) return []

            if (typeof state.groups[0] === 'string'){
                return state.groups as string[]
            }
            return (state.groups as group[]).map(g => g.name)
        }
    },

    actions: {

        fixImage(path: string): string {
            return path.startsWith("http")
            ? path
            : `http://localhost:3000/${path.replace(/\\/g, "/")}`;
        },
        async fetchCategories() {
            try {
                const response = await axios.get("http://localhost:3000/api/categories");

                // assign directly (Pinia unwraps refs)
                this.categories = response.data.map((item: category) => ({
                ...item,
                image: this.fixImage(item.image),
                }));

            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        },

        async fetchCategoryById(id: string | number) {
            try {
                const response = await axios.get(`http://localhost:3000/api/categories/${id}`)
                return response.data
            } catch (error) {
                console.error(`Error fetching category with id ${id}:`, error)
                return null
            }
        },

        async fetchPromotions() {
            try {
                const response = await axios.get("http://localhost:3000/api/promotions");

                this.promotions = response.data.map((item: promotion) => ({
                ...item,
                image: this.fixImage(item.image),
                }));

            } catch (error) {
                console.error("Error fetching promotions:", error);
            }
        },

        async fetchGroups() {
            try{
                const response = await axios.get("http://localhost:3000/api/groups")
                this.groups = response.data
                console.log('Groups loaded:', this.groups)
            }catch (error){
                console.error('Error fetching groups:', error)
            }
        },

        async fetchProducts() {
            try{
                const response = await axios.get("http://localhost:3000/api/products")
                this.products = response.data.map((item: product) => {
                    let imagePath = item.image

                    if (typeof imagePath === 'string' && imagePath.startsWith('[')){
                        try{
                            const parsed = JSON.parse(imagePath)
                            imagePath = parsed[0] || ''
                        }catch (e){
                            console.error('Error parsing image:', e)
                            imagePath = ''
                        }
                    }

                    if (typeof imagePath === 'string') {
                        imagePath = imagePath.replace(/\\/g, '/')
                    }

                        return {
                            ...item,
                            // use the processed imagePath (after parsing and normalization)
                            image: this.fixImage(typeof imagePath === 'string' ? imagePath : ''),
                        }
                })
                console.log('Products loaded:', this.products)
            }catch (error){
                console.error('Error fetching products:', error)
            }
        }
    }
    
})