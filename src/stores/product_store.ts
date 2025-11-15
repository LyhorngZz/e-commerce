import { defineStore } from "pinia";

export interface group {
    id: number;
    name: string;
}

export interface promotion {
    id: number;
    title: string;
    discount: number;
}

export interface category {
    id: number;
    name: string;
}

export interface product {
    id: number;
    name: string;
    price: number;
    image: string;
    categoryId: number;
    countSold: number;
    rating: number;
    size: string;
    discount: number;
}

export const productStore = defineStore('product', {
    state: () => ({
        groups: [] as group[],
        promotions: [] as promotion[],
        categories: [] as category[],
        products: [] as product[],
    }),
    
    getters: {
        
        getCategoriesByGroup: (state) => {
            return (groupId: number) => {
                return state.categories.filter(category => category.id === groupId);
            }
        },

        getProductsBygroup: (state) => {
            return (groupId: number) => {
                const categoriesInGroup = state.categories.filter(category => category.id === groupId).map(cat => cat.id);
                return state.products.filter(product => categoriesInGroup.includes(product.categoryId));
            }
        },

        getProductsByCategory: (state) => {
            return (categoryId: number) => {
                return state.products.filter(product => product.categoryId === categoryId);
            }
        },

        //getPopularProducts() : Any product with countSold > 10 is considered popular
        getPopularProducts: (state) => {
            return state.products.filter(product => product.countSold > 10);
        }
    },

    actions: {
        addGroup(newGroup: group) {
            this.groups.push(newGroup);
        },
        addPromotion(newPromotion: promotion) {
            this.promotions.push(newPromotion);
        },
        addCategory(newCategory: category) {
            this.categories.push(newCategory);
        },
        addProduct(newProduct: product) {
            this.products.push(newProduct);
        }
    }
    
})