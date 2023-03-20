<script setup>
import { ref, computed } from "vue";
import axios from "axios";

const achievements = ref([]);

const completedAchievements = computed(() =>
    achievements.value.filter((achievement) => achievement.completed)
);

const incompleteAchievements = computed(() =>
    achievements.value.filter((achievement) => !achievement.completed)
);

const get = async (url) => {
    try {
        return axios.get(url);
    } catch (error) {
        console.log(error);
    }
};

const loadAchievements = async () => {
    achievements.value = (await get("/achievements")).data;
};

const updateAchievement = (achievement) => {
    achievement.completed = !achievement.completed;
};

loadAchievements();
</script>

<template>
    <main class="wrapper">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none"
                    >
                        <div>
                            <h2
                                class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"
                            >
                                Incomplete Achievements
                            </h2>

                            <p
                                class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                                v-for="(task, index) in incompleteTasks"
                                :key="index"
                            >
                                <button @click="updateTask(task)">-</button>
                                <span class="title">{{ task.name }}</span>
                                <span class="description">
                                    {{ task.description }}</span
                                >
                            </p>
                        </div>
                    </div>
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none"
                    >
                        <div>
                            <h2
                                class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"
                            >
                                Complete Achievements
                            </h2>
                            <p
                                class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                                v-for="(task, index) in completeTasks"
                                :key="index"
                            >
                                <button @click="updateTask(task)">-</button>
                                <span class="title">{{ task.name }}</span>
                                <span class="description">
                                    {{ task.description }}</span
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped></style>
