<!-- Font Awesome -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<template>
        <li class="nav-item dropdown mt-1 me-2">
            <a class="nav-link" data-toggle="dropdown" href="">
                <i class="far fa-bell" id="bell">
                    <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ unreadNotifications.length }}
                    </span>
                </i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <div v-if="unreadNotifications.length == 0" class="ps-2">
                    No Notifications Now
                </div>
                <div v-else>
                    <ul class="m-2 p-2">
                        <a href="/mark" class="link-danger text-center text-decoration-none">
                            Mark All As Read
                        </a>
                        <li v-for="data in unreadNotifications" class="ms-3">
                            <hr />
                            {{ data["data"]["message"] }}
                        </li>
                    </ul>
                </div>
            </div>
        </li>
</template>

<script>
export default {
    props: ["unreads", "id"],
    data() {
        return {
            unreadNotifications: this.unreads,
        };
    },
    mounted() {
        console.log("Component mounted.");
        Echo.private("App.Models.User." + this.id).notification(
            (notification) => {
                console.log(notification.message);

                let newNotifications = {
                    data: { message: notification.message },
                };
                this.unreadNotifications.push(newNotifications);
            }
        );
    },
};
</script>
