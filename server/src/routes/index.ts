import { Router } from "express";
import * as userController from "../controllers/userController";
import storeUserRequest from "../requests/storeUserRequest";

const router = Router();

router.post("/users", storeUserRequest, userController.store);

export default router;
