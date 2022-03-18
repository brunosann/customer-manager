import { NextFunction, Request, Response } from "express";
import JWT from "jsonwebtoken";
import dotenv from "dotenv";

dotenv.config();

type PayloadtokenUser = {
  id: number;
  email: string;
  iat: number;
  exp: number;
};

export const auth = (req: Request, res: Response, next: NextFunction) => {
  const responseNotAuthorized = () => res.status(403).json({ error: "Não autorizado" });

  if (!req.headers.authorization) return responseNotAuthorized();

  const [authType, token] = req.headers.authorization.split(" ");

  if (authType !== "Bearer") return responseNotAuthorized();

  try {
    const decoded = JWT.verify(token, process.env.JWT_KEY as string) as PayloadtokenUser;
    req.body.userId = decoded.id;
    next();
  } catch (error) {
    return responseNotAuthorized();
  }
};
