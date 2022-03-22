import { Router } from "express";
import * as authController from "../controllers/authController";
import * as userController from "../controllers/userController";
import { dataValidation } from "../middlewares/dataValidation";
import forgotPasswordAuthRequest from "../requests/forgotPasswordAuthRequest";
import loginAuthRequest from "../requests/loginAuthRequest";
import storeUserRequest from "../requests/storeUserRequest";
import updateUserRequest from "../requests/updateUserRequest";

const router = Router();

router.post("/users", storeUserRequest, dataValidation, userController.store);
router.put("/users/:id", updateUserRequest, dataValidation, userController.update);

router.post("/auth/login", loginAuthRequest, dataValidation, authController.login);
router.post(
  "/auth/forgot-password",
  forgotPasswordAuthRequest,
  dataValidation,
  authController.forgotPassword
);

export default router;
