import { Router } from "express";
import * as userController from "../controllers/userController";
import { dataValidation } from "../middlewares/dataValidation";
import storeUserRequest from "../requests/storeUserRequest";
import updateUserRequest from "../requests/updateUserRequest";

const router = Router();

router.post("/users", storeUserRequest, dataValidation, userController.store);
router.put("/users/:id", updateUserRequest, dataValidation, userController.update);

export default router;
