import { Request, Response } from "express";
import { validationResult } from "express-validator";
import { User } from "../models/User";

export const store = async (req: Request, res: Response) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) return res.status(422).json({ errors: errors.mapped() });

  const { name, email, password } = req.body;

  const user = await User.create({ name, email, password });
  res.status(201).json(user);
};
